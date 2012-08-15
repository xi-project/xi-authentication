<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\Factories\CollectionFactory;
use Xi\DomainUtilities\Factories\DaoFactory;
use Xi\DomainUtilities\Factories\EntityFactory;
use Xi\DomainUtilities\BaseClasses\Entity;

abstract class Repository
{
    /**
     * The type of entities this repository manages as AggregateRoot
     * 
     * @var string 
     */
    protected $entityType;
    
    /**
     * Which framework to use for DataAccessObject
     * 
     * @var string 
     */
    protected $frameworkType;
    
    /**
     * Should be implemented with docBlock of concrete class for autocompletion
     * 
     * Should be a collection of the AggregateRoot objects
     * 
     * @var Collection 
     */
    protected $collection;
    
    /**
     * Gets the Entity Factory
     * 
     * @return EntityFactory
     */
    protected function getEntityFactory()
    {
        return EntityFactory::getInstance();
    }
    
    /**
     * Gets the Collection Factory
     * 
     * @return CollectionFactory
     */
    protected function getCollectionFactory()
    {
        return CollectionFactory::getInstance();
    }
    
    /**
     * Gets the DataAccessObject Factory
     * 
     * @return DaoFactory
     */
    protected function getDaoFactory()
    {
        return DaoFactory::getInstance();
    }
    
    /**
     * Creates Entity of the type AggregateRoot and adds it to the Repository's
     * Collection of AggregateRoot
     * 
     * @param array $params
     */
    protected function createAggregateRoot($params)
    {
        if($this->collection == null) {
            $this->collection = $this->getCollectionFactory()->create($this->entityType);
        }
        
        $this->collection->add($this->getEntityFactory()->create($this->entityType)->initEntity($params));
    }
    
    /**
     * Removes AggregateRoot from the Repository's Collection of AggregateRoots
     * 
     * @param Entity $entity
     */
    protected function removeAggregateRoot(Entity $entity)
    {
        if($this->collection === null) {
            $this->collection = $this->getCollectionFactory()->create($this->entityType);
        }
        
        $this->collection->remove($entity);
    }
    
    protected function getDao($daoClassName, $interfaces = array())
    {
        if(!isset($this->daos[$daoClassName])) {
            $this->daos[$daoClassName] = $this->getDaoFactory()->create($daoClassName, $this->frameworkType, $interfaces);
        }
        
        return $this->daos[$daoClassName];
    }
}