<?php
namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use Exception;

class FactoryInvalidInheritanceException extends Exception
{
    public function __construct() {
        parent::__construct("Tried to create a class that doesn't extend proper base class", 0, null);
    }
}