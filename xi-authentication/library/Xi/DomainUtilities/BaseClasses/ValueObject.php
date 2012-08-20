<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\DomainBase;

abstract class ValueObject extends DomainBase
{
    /**
     * ValueObjects may not have id!
     */
    
    abstract public function initValueObject($params);
}