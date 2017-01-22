<?php


namespace AppWebSms;

use AppWebSms\AppWebSmsMessage;

class AppWebSms
{
    protected $username;
    protected $password;
    protected $sender;
    protected $baseUrl = 'http://www.appwebsms.com/index.php';

    /**
     * AppWebSms constructor.
     * @param $username
     * @param $password
     * @param $sender
     */
    public function __construct($username, $password, $sender)
    {
        $this->username = $username;
        $this->password = $password;
        $this->sender = $sender;
    }

    public function sendSms(AppWebSmsMessage $message)
    {
         $this->prepareAndSendSms($message);
    }

    public function prepareAndSendSms( AppWebSmsMessage $message)
    {
        $recipient = $message->getRecipient();
        $message   = $message->getMessage();
            
    }
    
}