<?php
/**
 * Created by PhpStorm.
 * User: ducanh-ki
 * Date: 9/15/16
 * Time: 3:30 PM
 */

namespace CreativeDelta\ReCaptcha;


use Zend\Form\Element\Captcha;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement;

class ReCaptchaViewHelper extends FormElement
{
    const CLASS_VALUE = "g-recaptcha";

    /**
     * Invoke helper as functor
     *
     * Proxies to {@link render()}.
     *
     * @param  ElementInterface $element
     * @return string
     */
    public function __invoke(ElementInterface $element = null)
    {
        if (!$element) {
            return $this;
        }

        return $this->render($element);
    }

    /**
     * Render ReCaptcha form elements
     *
     * @param  ElementInterface $element
     * @return string
     */
    public function render(ElementInterface $element)
    {
        if ($element instanceof Captcha) {
            /** @var ReCaptcha $adapter */
            $adapter = $element->getCaptcha();
            return '<div class="' . self::CLASS_VALUE . '" data-sitekey="' . $adapter->getPublicKey() . '"></div>';
        } else {
            return '';
        }
    }
}