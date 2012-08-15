<?php
namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use Exception;

class FactoryInvalidClassException extends Exception
{
    public function __construct() {
        parent::__construct("Tried to create a class that doesn't exist", 0, null);
    }
}