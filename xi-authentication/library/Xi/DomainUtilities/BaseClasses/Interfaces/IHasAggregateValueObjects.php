<?php
namespace Xi\DomainUtilities\BaseClasses\Interfaces;

use Xi\DomainUtilities\BaseClasses\ValueObject;

/**
 * Can be implemented by Entities and Collections and ValueObjects
 */
interface IHasAggregateValueObjects
{
    public function addAggregateValueObject(ValueObject $valueObject, $aggregateRootId = null);
    
    public function removeAggregateValueObject(ValueObject $valueObject, $aggregateRootId = null);
}