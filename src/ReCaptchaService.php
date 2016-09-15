<?php
/**
 * Created by PhpStorm.
 * User: ducanh-ki
 * Date: 9/13/16
 * Time: 9:42 PM
 */

namespace CreativeDelta\ReCaptcha;

use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;


class ReCaptchaService
{

    const SERVICE_LINK = "https://www.google.com/recaptcha/api/siteverify";

    protected $publicKey;
    protected $privateKey;
    protected $httpClient;

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new HttpClient();
        }

        return $this->httpClient;
    }

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

    /**
     * @param $value string
     * @param $remoteip string
     * @return ReCaptchaResponse
     * @throws \Exception
     */
    public function verify($value, $remoteip)
    {
        try {

            $params = [
                'secret' => $this->getPrivateKey(),
                'remoteip' => $remoteip,
                'response' => $value,
            ];

            $response = $this->postRequest($params);
            return new ReCaptchaResponse($response->getContent());

        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    /**
     * @param $params array
     * @return \Zend\Http\Response
     * @throws \Exception
     */
    protected function postRequest($params)
    {

        if (!$this->privateKey) {
            throw new \Exception("Private key is null");
        }

        $request = new HttpRequest();
        $request->setUri(self::SERVICE_LINK);
        $request->getPost()->fromArray($params);
        $request->setMethod(HttpRequest::METHOD_POST);

        $httpClient = $this->getHttpClient();
        $httpClient->setEncType($httpClient::ENC_URLENCODED);

        return $httpClient->send($request);
    }
}