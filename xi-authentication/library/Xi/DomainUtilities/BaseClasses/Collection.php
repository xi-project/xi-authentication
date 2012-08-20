<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\DomainBase;
use Xi\DomainUtilities\BaseClasses\Entity;

abstract class Collection extends DomainBase
{
    protected $entities = array();
    
    abstract public function add(Entity $entity);
    
    abstract public function remove(Entity $entity);
    
    abstract public function getEntityById($entityId);
    
    abstract public function getEntities();
}