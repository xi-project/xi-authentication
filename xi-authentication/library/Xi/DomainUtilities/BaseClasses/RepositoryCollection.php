<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\AggregateRoot;
use Xi\DomainUtilities\BaseClasses\Entity;
use Xi\DomainUtilities\BaseClasses\ValueObject;

abstract class RepositoryCollection extends Collection
{
    abstract public function add(AggregateRoot $entity);
    
    abstract public function remove(AggregateRoot $entity);
    
    abstract public function getEntityById($entityId);
}