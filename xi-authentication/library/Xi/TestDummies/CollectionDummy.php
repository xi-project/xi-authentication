<?php
namespace Xi\TestDummies;

use Xi\DomainUtilities\BaseClasses\Collection;
use Xi\DomainUtilities\BaseClasses\Entity;
use Xi\DomainUtilities\BaseClasses\ValueObject;

class CollectionDummy extends Collection
{
    public function add(Entity $entity)
    {
        $this->entities[$entity->getId] = $entity;
    }
    
    public function remove(Entity $entity)
    {
        unset($this->entities[$entity->getId()]);
    }
    
    public function addAggregateEntity($aggregateRootId, Entity $entity)
    {
        $this->entities[$aggregateRootId]->addEntity($entity);
    }
    
    public function removeAggregateEntity($aggregateRootId, Entity $entity)
    {
        $this->entities[$aggregateRootId]->removeEntity($entity);
    }
    
    public function addAggregateValueObject($aggregateRootId, ValueObject $valueObject)
    {
        $this->entities[$aggregateRootId]->addValueObject($valueObject);
    }
    
    public function removeAggregateValueObject($aggregateRootId, ValueObject $valueObject)
    {
        $this->entities[$aggregateRootId]->removeValueObject($valueObject);
    }
}