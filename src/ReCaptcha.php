<?php
/**
 * Created by PhpStorm.
 * User: ducanh-ki
 * Date: 9/13/16
 * Time: 6:35 PM
 */

namespace ZF2ReCaptcha;

use Zend\Captcha\AbstractAdapter;

class ReCaptcha extends AbstractAdapter
{

    const SERVICE_NOT_FOUND = "";
    const PUBLICKEY_NOT_FOUND = "";
    const PRIVATEKEY_NOT_FOUND = "";

    protected $messageTemplates = [
        self::SERVICE_NOT_FOUND => "",
        self::PUBLICKEY_NOT_FOUND => "",
        self::PRIVATEKEY_NOT_FOUND => ""
    ];

    protected $service;

    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->setService(new ReCaptchaService());
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
     */
    public function setPublicKey($publicKey)
    {
        $this->getService()->setPublicKey($publicKey);
        return $this;
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
     */
    public function setPrivateKey($privateKey)
    {
        $this->getService()->setPrivateKey($privateKey);
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

    public function isValid($value)
    {
        // TODO: Implement isValid() method.
    }
}