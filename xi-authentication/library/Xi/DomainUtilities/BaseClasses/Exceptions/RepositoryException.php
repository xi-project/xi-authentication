<?php

namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use \Exception;

class RepositoryException extends Exception
{    
    public function __construct($message, $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }    
}