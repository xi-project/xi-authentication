<?php
namespace Xi\DomainUtilities\BaseClasses;

abstract class Entity
{
    protected $entityId;
    
    abstract public function getId();
    
    abstract public function initEntity($params);
}