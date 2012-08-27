<?php
namespace Xi\DomainUtilities\BaseClasses\Exceptions;

use Exception;

class EntityInterfaceNotImplemented extends Exception
{
    public function __construct($className, $interfaceName) {
        parent::__construct("Class ".$className." doesn't implement interface ".$interfaceName, 0, null);
    }
}