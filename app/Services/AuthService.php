<?php


namespace App\Services;


use App\Constants\UserTypeConstant;
use App\Http\Resources\UserResource;
use App\Mail\EmailCode;
use App\Models\User;
use App\Models\UserLegal;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class AuthService
{

    public function searchFromUsers($searchBy, $validatedData, $userType, $request)
    {

        if ($request['user_type'] != UserTypeConstant::LEGAL_ENTITY) {
            $user = User::where($searchBy, $validatedData)->first();
        }
        $user = $this->searchFromUserLegals($searchBy, $validatedData, $userType);
        return $user;
    }

    public function searchFromUserLegals($searchBy, $emailOrPhoneNumber, $user_type)
    {
        $user = User::where($searchBy, $emailOrPhoneNumber)->where('user_type', $user_type)->with('userLegals')->first();
        if (!$user) {
            return null;
        }
        return $user;
    }

    public function login($request): JsonResponse
    {
        // Check if authorization is from email or phone number
        if (Arr::exists($request, 'email')) {
            $user = $this->searchFromUsers('email', $request['email'], $request['user_type'], $request);
        } else {
            $user = $this->searchFromUsers('phone_number', $request['phone_number'], $request['user_type'], $request);
        }

        // Final step if user exists then check password
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Пользователь не найден'
            ]);
        }
        if (!Hash::check($request['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Ваш логин или пароль неверны - попробуйте снова'
            ]);
        }

        if (!$token = auth('api')->attempt($request)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => new UserResource(auth('api')->user()),
        ]);
    }


    //Step 1
    public function sendCode($request): JsonResponse
    {
        if(!empty($request['phone_number'])){
            return $this->sendSmsCode($request['phone_number']);
        }
        if(!empty($request['email'])){
            return $this->sendMailCode($request['email']);
        }
    }

    public function sendSmsCode($phone): JsonResponse
    {
        $code = rand(1000, 9999);

        $user_registration["code"] = $code;

        Redis::set("registration:{$phone}", json_encode($user_registration));

        Http::get('https://smscentre.com/sys/send.php?login=Razum.is&psw=igot2021!&phones=' . $phone . '&mes=' . $code . '- подтверждение для Agrosearch');

        return response()->json(['message' => 'Отправлено'], 200);
    }

    public function sendMailCode($email): JsonResponse
    {
        $code = rand(1000, 9999);

        $user_registration["code"] = $code;
        Redis::connection();
        Redis::set("registration:{$email}", json_encode($user_registration));

        Mail::to($email)->send(new EmailCode($code));

        return response()->json(['message' => 'Отправлено'], 200);

    }

    //Step 2
    public function confirmCode($request): JsonResponse
    {
        $code = $request['code'];
        if(!empty($request['phone_number'])){
            $phone = $request['phone_number'];
            $user_registration_info = json_decode(Redis::get("registration:$phone"), true);
        }
        if(!empty($request['email'])){
            $email = $request['email'];
            $user_registration_info = json_decode(Redis::get("registration:$email"), true);
        }

        if ($user_registration_info["code"] == $code) {
            return response()->json(['confirmed' => true], 200);
        } else {
            return response()->json(['confirmed' => false], 422);
        }

    }

    //Step 3
    public function infoIndividual($request): JsonResponse
    {
       return $this->saveRedisInfoUser($request);
    }

    public function infoCompany($request): JsonResponse
    {
       return $this->saveRedisInfoUser($request);
    }

    public function saveRedisInfoUser($request): JsonResponse
    {
        if(!empty($request['phone_number'])){
            $phone = $request['phone_number'];
            Redis::set("registration:{$phone}", json_encode($request));

        }
        if(!empty($request['email'])){
            $email = $request['email'];
            Redis::set("registration:{$email}", json_encode($request));
        }

        return response()->json(['message' => 'Приняты'], 200);
    }

    //Step 4
    public function register($request): JsonResponse
    {

        if(!empty($request['phone_number'])){
            $id = $request['phone_number'];
        }
        if(!empty($request['email'])){
            $id = $request['email'];
        }

        $user_registration_info = json_decode(Redis::get("registration:$id"), true);
        $user_registration_info['password'] = Hash::make($request['password']);
        if ($user_registration_info['user_type'] = 1){
             User::create($user_registration_info);
        }
        if ($user_registration_info['user_type'] = 2){
            $user = User::create($user_registration_info);

            $user_registration_info['user_id'] = $user->id;
            UserLegal::create($user_registration_info);

        }

        return response()->json(['registration' => "completed"]);
    }

}
