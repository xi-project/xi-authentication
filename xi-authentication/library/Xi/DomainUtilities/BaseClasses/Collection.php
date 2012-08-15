<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\Entity;

abstract class Collection
{
    protected $entities = array();
    
    abstract public function add(Entity $entity);
    
    abstract public function remove(Entity $entity);
    
    abstract public function getEntityById($entityId);
}