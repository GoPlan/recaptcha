# recaptcha
A PHP ZF2 - ReCAPTCHA Adapter (Google)

This recaptcha class is used as an adapter to ZF2 default CAPTCHA form element. It renders Google (clickable) ReCaptcha Html div tag.

Two major inputs are a public key and a private key. The public key is the site key, while the private key is the secret acquired from Google.

An example code is as below:

            $reCaptcha = new CDReCaptcha(); // This recaptcha class (CDReCaptcha is an alias to ReCaptcha)
            $reCaptcha->setPublicKey($publicKey);
            $reCaptcha->setPrivateKey($privateKey);
            $captchaElement = new Captcha('g-recaptcha-response');
            $captchaElement->setCaptcha($reCaptcha);

(The $captchaElement is then added to a form object)

If you need assistance or further improvement of this package, feel free to email me at ducanh.ke@gmail.com
