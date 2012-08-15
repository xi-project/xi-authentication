<?php
namespace Xi\DomainUtilities\Factories\Exceptions;

use Exception;

class DaoFactoryInterfaceNotImplementedException extends Exception
{
    public function __construct() {
        parent::__construct("The DAO doesn't implemented all the required interfaces", 0, null);
    }
}