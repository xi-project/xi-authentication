<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\DomainBase;

abstract class Entity extends DomainBase
{
    protected $entityId;
    
    abstract public function getId();
    
    abstract public function initEntity($params);
}