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

    const MISSING_INPUT_SECRET = "missing-input-secret";
    const INVALID_INPUT_SECRET = "invalid-input-secret";
    const MISSING_INPUT_RESPONSE = "missing-input-response";
    const INVALID_INPUT_RESPONSE = "invalid-input-response";

    protected $params;

    protected $errorTemplates = [
        self::MISSING_INPUT_SECRET => "The secret parameter is missing",
        self::INVALID_INPUT_SECRET => "The secret parameter is invalid or malformed.",
        self::MISSING_INPUT_RESPONSE => "The response parameter is missing.",
        self::INVALID_INPUT_RESPONSE => "The response parameter is invalid or malformed."
    ];

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

    public function errorMessage($code)
    {
        return $this->errorTemplates[$code];
    }
}