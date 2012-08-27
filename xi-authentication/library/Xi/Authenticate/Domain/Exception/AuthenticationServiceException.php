<?php

namespace Xi\Authenticate\Domain\Exception;

use Xi\DomainUtilities\BaseClasses\Exceptions\ServiceException;
use Xi\DomainUtilities\BaseClasses\Adapters\ExceptionResponseAdapter;

class AuthenticationServiceException extends ServiceException
{
    public function __construct($message, ExceptionResponseAdapter $exceptionResponseAdapter, $previous = null)
    {
        parent::__construct($message, $exceptionResponseAdapter, $previous);
    }
}