<?php
namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use Exception;

class FactoryInvalidInheritanceException extends Exception
{
    public function __construct($className, $type) {
        parent::__construct("Tried to create a class (".$className.") that doesn't extend proper base class of type ".$type, 0, null);
    }
}