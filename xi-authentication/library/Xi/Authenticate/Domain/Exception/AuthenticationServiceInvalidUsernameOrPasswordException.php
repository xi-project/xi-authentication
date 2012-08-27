<?php

namespace Xi\Authenticate\Domain\Exception;

use Xi\Authenticate\Domain\Exception\AuthenticationServiceException;

use Xi\DomainUtilities\BaseClasses\Adapters\ExceptionResponseAdapter;

class AuthenticationServiceInvalidUsernameOrPasswordException extends AuthenticationServiceException
{
    public function __construct(ExceptionResponseAdapter $exceptionResponseAdapter, $previous = null) 
    {
        parent::__construct('Invalid username or password', $exceptionResponseAdapter, $previous);
    }
}