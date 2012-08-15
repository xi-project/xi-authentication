<?php
namespace Xi\TestDummies;

use Xi\DomainUtilities\BaseClasses\Entity;

class EntityDummy extends Entity
{
    public function getId()
    {
        return $this->entityId;
    }
    public function initEntity($params)
    {
        $this->entityId = $params['id'];
    }
}