<?php

function  sendBaseEmail(string $receiver, string $text) {
    //…
}

function  sendBaseSms(string $receiver, string $text) {
    //…
}

function sendMessage(string $type, string $receiver, string $text) {
    switch ($type) {
        case ‘emac_base’:
            return sendBaseEmail($receiver, $text);
        case ‘sms_base’:
            return sendBaseSms($receiver, $text);
    }
}



abstract class SendMessage
{
    protected string $receiver ;
    protected string $text ;
    protected string $type ;

    public function __construct()
    {

    }

    abstract public function sendBaseEmail(string $receiver, string $text): string;
    abstract public function sendBaseSms(string $receiver, string $text): string;

    public function sendMessage(string $receiver, string $text, string $type): int
    {
        switch ($type) {
            case 'emac_base':
                return $this->sendBaseEmail($receiver, $text);
            case 'sms_base':
                return $this->sendBaseSms($receiver, $text);
        }

        return 200;
    }

}

class Message extends SendMessage
{
    public function __construct(string $receiver,string $text, string $type)
    {
        parent::__construct();

        $this->receiver = $receiver;
        $this->text = $text;
        $this->type = $type;
    }

    public function sendBaseEmail(string $receiver, string $text): string
    {
        // TODO: Implement sendBaseEmail() method.
        return 1;
    }

    public function sendBaseSms(string $receiver, string $text): string
    {
        // TODO: Implement sendBaseSms() method.
        return 1;
    }

}

$newReserveMail = new Message('$receiver', '$text', '$type');
$res = $newReserveMail->sendMessage('$receiver', '$text', '$type');

//Для решения загруженной системы использовал бы два варианты это полюбому очереди
// Могу привести пример на Laravel как бы решил создал бы очередь(воркер) и поставил бы крон выполнять каждую минуту
//1 вариант Redis
//2 вариант стороннию библиотеку German первое что нашел в интернете
