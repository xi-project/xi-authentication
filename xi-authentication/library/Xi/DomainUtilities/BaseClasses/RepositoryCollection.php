<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\AggregateRoot;

abstract class RepositoryCollection extends Collection
{
    abstract public function add(AggregateRoot $entity);
    
    abstract public function remove(AggregateRoot $entity);
    
    abstract public function getEntityById($entityId);
}