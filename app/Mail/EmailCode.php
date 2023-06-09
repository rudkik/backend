<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailCode extends Mailable{
    use Queueable, SerializesModels;

    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    public function build(): EmailCode
    {
        return $this->subject('Agrosearch')
            ->view('emails.code.mail', [
                'data' =>  $this->code,
            ]);
    }
}
