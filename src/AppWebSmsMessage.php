<?php
/**
 * Created by PhpStorm.
 * User: dubem
 * Date: 1/21/17
 * Time: 8:17 AM
 */

namespace AppWebSms;


class AppWebSmsMessage
{
    protected $message;
    
    protected $recipient;

    /**
     * AppWebSmsMessage constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
    
    /**
     * @param $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = is_array($recipient) ? implode(',',$recipient) : $recipient;
    }
    
    /**
     * @return mixed
     */
    public function getRecipient()
    {
        return $this->recipient;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
}