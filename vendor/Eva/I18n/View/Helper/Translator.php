<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_I18n
 * @subpackage View
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

namespace Eva\I18n\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\I18n\Exception;

/**
 * View helper for translating messages.
 *
 * @category   Zend
 * @package    Zend_I18n
 * @subpackage View
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Translator extends \Zend\View\Helper\AbstractHelper
{
    /**
     * Translator instance.
     *
     * @var Translator
     */
    protected $translator;

    /**
     * Set translator.
     *
     * @param  Translator $translator
     * @return Translate
     */
    public function setTranslator(\Zend\I18n\Translator\Translator $translator)
    {
        $this->translator = $translator;
        return $this;
    }

    public function getTranslator()
    {
        if($this->translator) {
            return $this->translator;
        }
    }

    /**
     * Translate a message.
     *
     * @param  string $message
     * @param  string $textDomain
     * @param  string $locale
     * @return string
     * @throws Exception\RuntimeException
     */
    public function __invoke($message, $textDomain = 'default', $locale = null)
    {
        if ($this->translator === null) {
            return $message;
        }

        return $this->translator->translate($message, $textDomain, $locale);
    }
}