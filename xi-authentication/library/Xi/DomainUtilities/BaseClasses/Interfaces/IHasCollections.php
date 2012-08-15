<?php

namespace Xi\DomainUtilities\BaseClasses\Interfaces;

use Xi\DomainUtilities\BaseClasses\Collection;

/**
 * Can be implemented by Entities and Collections and ValueObjects
 */
interface IHasCollections
{
    public function addCollection(Collection $collection);
    
    public function removeColleciton(Collection $collection);
}