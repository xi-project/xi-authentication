<?php

namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use Xi\DomainUtilities\BaseClasses\Adapters\ExceptionResponseAdapter;
use Exception;

class ServiceException extends Exception
{
    private $responseAdapter;
    
    public function __construct($message, ExceptionResponseAdapter $responseAdapter, $previous = null) {
        parent::__construct($message, 0, $previous);
        
        $this->responseAdapter = $responseAdapter;
    }
    
    public function getExceptionResponse()
    {
        $this->responseAdapter->parseExceptionResponse($this->getMessage());
    }
}