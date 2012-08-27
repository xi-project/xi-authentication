<?php

namespace Xi\Authenticate\Domain\Exception;

use Xi\DomainUtilities\BaseClasses\Exceptions\RepositoryException;

class UserRepositoryException extends RepositoryException
{
    public function __construct($message, $previous = null) {
        parent::__construct($message, $previous);
    }
}