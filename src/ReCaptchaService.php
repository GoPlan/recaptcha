<?php
/**
 * Created by PhpStorm.
 * User: ducanh-ki
 * Date: 9/13/16
 * Time: 9:42 PM
 */

namespace ZF2ReCaptcha;


class ReCaptchaService
{

    protected $publicKey;
    protected $privateKey;

    /**
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param mixed $publicKey
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    }

    /**
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param mixed $privateKey
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function verify()
    {

    }
}