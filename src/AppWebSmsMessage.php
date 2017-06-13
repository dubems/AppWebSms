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

    protected $schedule;

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
     * Set the schedule for sending the message
     *
     * @param $schedule
     */
    public function setSchedule($schedule)
    {
        $this->schedule  = $schedule;
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

    /**
     * @return mixed
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
}