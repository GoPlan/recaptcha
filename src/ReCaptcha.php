<?php
/**
 * Created by PhpStorm.
 * User: ducanh-ki
 * Date: 9/13/16
 * Time: 6:35 PM
 */

namespace CreativeDelta\ReCaptcha;

use Zend\Captcha\AbstractAdapter;

class ReCaptcha extends AbstractAdapter
{

    const SERVICE_IS_UNDEFINED = "service-is-undefined";
    const RESPONSE_IS_INVALID = "response-is-invalid";
    const MISSING_INPUT_SECRET = "missing-input-secret";
    const INVALID_INPUT_SECRET = "invalid-input-secret";
    const MISSING_INPUT_RESPONSE = "missing-input-response";
    const INVALID_INPUT_RESPONSE = "invalid-input-response";

    protected $messageTemplates = [
        self::SERVICE_IS_UNDEFINED => "Service is undefined or null",
        self::RESPONSE_IS_INVALID => "Response is invalid",
        self::MISSING_INPUT_SECRET => "The secret parameter is missing",
        self::INVALID_INPUT_SECRET => "The secret parameter is invalid or malformed.",
        self::MISSING_INPUT_RESPONSE => "The response parameter is missing.",
        self::INVALID_INPUT_RESPONSE => "The response parameter is invalid or malformed."
    ];

    protected $service;

    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->service = new ReCaptchaService();
    }

    /**
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->getService()->getPrivateKey();
    }

    /**
     * @param mixed $privateKey
     * @return $this
     */
    public function setPrivateKey($privateKey)
    {
        $this->getService()->setPrivateKey($privateKey);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->getService()->getPublicKey();
    }

    /**
     * @param mixed $publicKey
     * @return $this
     */
    public function setPublicKey($publicKey)
    {
        $this->getService()->setPublicKey($publicKey);
        return $this;
    }

    /**
     * @return ReCaptchaService
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param ReCaptchaService $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    public function generate()
    {
        // TODO: Implement generate() method.
    }

    public function isValid($value, $context = null)
    {
        if (!$this->service) {
            $this->error(self::SERVICE_IS_UNDEFINED);
            return false;
        }

        $response = $this->getService()->verify($value, null);

        if (!$response) {
            $this->error(self::RESPONSE_IS_INVALID);
            return false;
        }

        if ($response->isSuccess()) {

            return true;

        } else {

            foreach ($response->errorCodes() as $errorCode) {
                $this->error($errorCode);
            }

            return false;
        }
    }

    public function getHelperName()
    {
        return 'creativedelta/recaptcha';
    }
}