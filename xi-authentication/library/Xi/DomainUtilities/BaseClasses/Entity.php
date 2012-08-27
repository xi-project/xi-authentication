<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\DomainBase;

abstract class Entity extends DomainBase
{
    protected $entityId;
    
    protected $interfaces = array();
    
    abstract public function getId();
    
    public function initEntity($initObject)
    {
        foreach ($this->interfaces as $interface)
        {
            if(!$initObject instanceof $interface) {
                throw new Exceptions\EntityInterfaceNotImplemented(get_class($initObject), get_class($interface));
            }
        }
    }
}