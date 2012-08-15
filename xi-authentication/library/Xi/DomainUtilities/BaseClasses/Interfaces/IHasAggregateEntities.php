<?php

namespace Xi\DomainUtilities\BaseClasses\Interfaces;

use Xi\DomainUtilities\BaseClasses\Entity;

/**
 * Can be implemented by Entities and Collections and ValueObjects
 */
interface IHasAggregaetEntities 
{
    public function addAggregateEntity(Entity $entity, $aggregateRootId = null);
    
    public function removeAggregateEntity(Entity $entity, $aggregateRootId = null);
}