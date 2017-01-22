<?php
/**
 * Created by PhpStorm.
 * User: dubem
 * Date: 1/21/17
 * Time: 8:24 AM
 */

namespace AppWebSms;

use Exception;
use AppWebSms\AppWebSms as AppWebSmsClient;
use Illuminate\Notifications\Notification;
use AppWebSms\Exceptions\CouldNotSendNotification;


class AppWebSmsChannel
{
    /**
     * @var AppWebSms
     */
    protected $appWebSms;

    /**
     * AppWebSmsChannel constructor.
     * @param AppWebSms $appWebSms
     */
    public function __construct(AppWebSmsClient $appWebSms)
    {
        $this->appWebSms = $appWebSms;
    }

    public function send($notifiable,Notification $notification)
    {
        if (! $recipient = $notifiable->routeNotificationFor('app-web-sms')) {
            throw CouldNotSendNotification::missingTo();
        }

        $message = $notification->toAppWebSms($notifiable);
        
        if(is_string($message))
        {
            $message = new AppWebSmsMessage($message);
        }
        
        $message->setRecipient($recipient);
        
        try{
            $response = $this->appWebSms->sendSms($message);
            
            return $response;
            
        } catch(Exception $exception){
            throw CouldNotSendNotification::ErrorFromService($exception);
        }
    }
}