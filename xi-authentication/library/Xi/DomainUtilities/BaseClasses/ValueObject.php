<?php
namespace Xi\DomainUtilities\BaseClasses;

abstract class ValueObject
{
    /**
     * ValueObjects may not have id!
     */
    
    abstract public function initValueObject($params);
}