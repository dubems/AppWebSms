<?php


namespace AppWebSms;

use AppWebSms\AppWebSmsMessage;
use GuzzleHttp\Client;

class AppWebSms
{
    
    protected $username;
    protected $password;
    protected $sender;
    protected $baseUrl = 'http://www.appwebsms.com';

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
        $params = [
            'option'=>'com_spc',
            'comm'=>'spc_api',
            'username'=>$this->username,
            'password'=>$this->password,
            'sender'=>'@@'.$this->sender.'@@',
            'recipient'=>'@@'.$recipient.'@@',
            'message'=>'@@'.$message.'@@'
        ];

       return   $this->sendRequest($params);
    }

    protected function sendRequest($params)
    {
        $client = new Client(['base_uri'=>$this->baseUrl]);
        $response = $client->get('/index.php',['query'=>$params]);

        return $response;
    }
}