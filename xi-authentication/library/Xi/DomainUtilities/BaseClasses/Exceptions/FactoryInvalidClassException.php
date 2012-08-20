<?php
namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use Exception;

class FactoryInvalidClassException extends Exception
{
    public function __construct($className) {
        parent::__construct("Class ".$className." doesn't exist", 0, null);
    }
}