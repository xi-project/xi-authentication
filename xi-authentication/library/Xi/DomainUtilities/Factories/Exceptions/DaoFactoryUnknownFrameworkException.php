<?php
namespace Xi\DomainUtilities\Factories\Exceptions;

use Exception;

class DaoFactoryUnknownFrameworkException extends Exception
{
    public function __construct() {
        parent::__construct("Unknown DAO type", 0, null);
    }
}