<?php
/**
 * Created by PhpStorm.
 * User: dubem
 * Date: 1/22/17
 * Time: 8:39 PM
 */

namespace AppWebSms\Exceptions;


class CouldNotSendNotification extends \Exception
{

    public static function missingTo()
    {
        return new static('The recipient is not provided');
    }

    public static function ErrorFromService($exception)
    {
        return new static('Notification was not sent:'.$exception->getMessage(),$exception->getTrace());
    }
}