<?php
namespace Xi\TestDummies;

use Xi\DomainUtilities\BaseClasses\Entity;

class EntityDummy extends Entity
{
    protected $interfaces = array("IGetDummyProperty");
    
    protected $dummyProperty;
    
    public function getId()
    {
        return $this->entityId;
    }
    public function initEntity($initObject)
    {
        parent::initEntity($initObject);
        
        $this->dummyProperty = $initObject->getDummyProperty();
    }
}