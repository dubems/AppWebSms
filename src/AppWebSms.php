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
        $this->sender   = $sender;
    }

    public function sendSms(AppWebSmsMessage $message)
    {
        return $this->prepareAndSendSms($message);
    }

    public function prepareAndSendSms( AppWebSmsMessage $message)
    {
        $recipient = $message->getRecipient();
        $schedule  = $message->getSchedule();
        $message   = $message->getMessage();


        $params = [
            'option'=>'com_spc',
            'comm'=>'spc_api',
            'username'=> $this->username,
            'password'=> $this->password,
            'sender'=> $this->sender,
            'recipient'=> $recipient,
            'message'=> $message,
            'schedule'=>$schedule
        ];


        return   $this->sendRequest($params);
    }

    protected function sendRequest($params)
    {

        $query = http_build_query($params);
        $url = $this->baseUrl.'/index.php' . "?" . $query;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}