<?php

namespace App\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

class RFUserAdminCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'rocketfirm:user:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание пользователя с правами admin.';

    /**
     * Get user options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['without-data-entry', null, InputOption::VALUE_NONE, 'Не вводить данные', null],
        ];
    }

    public function fire()
    {
        return $this->handle();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $user = $this->getUser(
            $this->option('without-data-entry')
        );

        if (!$user) {
            exit;
        }

        $this->addRoleByUser($user);
    }

    /**
     * Добавление роли пользователю.
     *
     * @param User $user
     *
     * @return void
     */
    protected function addRoleByUser(User $user): void {
        $role = $this->getAdministratorRole();
        $permissions = Voyager::model('Permission')->all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        $user->role_id = $role->id;

        $user->save();
    }

    /**
     * Get command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['email', InputOption::VALUE_REQUIRED, 'Почта пользователя.', null],
        ];
    }

    /**
     * Get the administrator role, create it if it does not exists.
     *
     * @return Role
     */
    protected function getAdministratorRole(): Role
    {
        $role = Voyager::model('Role')->firstOrNew([
            'name' => 'admin',
        ]);

        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Администратор',
            ])->save();
        }

        return $role;
    }

    /**
     * Create user.
     *
     * @param bool $without_data_entry
     *
     * @return User
     */
    protected function getUser(bool $without_data_entry = false): User
    {
        $email = $this->argument('email');

        $model = Auth::guard(app('VoyagerGuard'))->getProvider()->getModel();
        $model = Str::start($model, '\\');

        if (!$email) {
            $email = $this->ask('Введите почту');
        }

        if ($model::where('email', $email)->exists()) {
            $this->info("Пользователь с такой почтой уже существует.");

            $email = $this->ask('Введите почту аккаунта');

            if ($model::where('email', $email)->exists()) {
                return $this->getUser($without_data_entry);
            }
        }

        if ($without_data_entry) {
            $name = 'Admin';
            $password = '123456';
        } else {
            $name = $this->ask('Введите название аккаунта');
            $password = $this->secret('Введите пароль аккаунта');
        }

        $this->info('Аккаунт создан!');

        return call_user_func($model.'::forceCreate', [
            'first_name' => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);
    }
}
