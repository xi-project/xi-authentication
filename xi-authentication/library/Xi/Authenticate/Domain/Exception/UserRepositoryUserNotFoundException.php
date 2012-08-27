<?php

namespace Xi\Authenticate\Domain\Exception;

class UserRepositoryUserNotFoundException extends UserRepositoryException
{
    public function __construct() {
        parent::__construct('User not found');
    }
}