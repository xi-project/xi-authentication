<?php
namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use Exception;

class InvalidAdapterException extends Exception
{
    public function __construct($adapterName, $settingClassName) {
        parent::__construct('Tried to use wrong adapter as '.$adapterName." for ".$settingClassName, 0, null);
    }
}