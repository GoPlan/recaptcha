<?php
/**
 * Created by PhpStorm.
 * User: ducanh-ki
 * Date: 9/15/16
 * Time: 11:34 AM
 */

namespace CreativeDelta\ReCaptcha;


class ReCaptchaResponse
{

    protected $params;

    public function __construct($params = null)
    {
        $this->params = $params;
    }

    public function isSuccess()
    {
        return $this->params['success'];
    }

    public function getHostName()
    {
        return $this->params['hostname'];
    }

    public function getTimeStamp()
    {
        return $this->params['challenge_ts'];
    }

    public function errorCodes()
    {
        return $this->params['errorCodes'];
    }
}