<?php
/**
 * Created by PhpStorm.
 * User: dubem
 * Date: 1/24/17
 * Time: 7:55 PM
 */

namespace AppWebSms\Exceptions;


use Exception;

class InvalidConfiguration extends Exception
{

    public static function configNotFound()
    {
        return new static('Configuration not found. Please enter configuration parameters in config/services as in the documentation');
    }
}