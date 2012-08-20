<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\DomainBase;
use Xi\DomainUtilities\BaseClasses\Entity;

use Xi\DomainUtilities\Factories\CollectionFactory;
use Xi\DomainUtilities\Factories\DaoFactory;
use Xi\DomainUtilities\Factories\EntityFactory;
use Xi\DomainUtilities\Factories\ValueObjectFactory;

use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

abstract class Repository extends DomainBase
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
     * The namespace of the AggregateRoot
     * @var string 
     */
    protected $entityNamespace;
    
    /**
     * Should be implemented with docBlock of concrete class for autocompletion
     * 
     * Should be a collection of the AggregateRoot objects
     * 
     * @var RepositoryCollection 
     */
    protected $collection;
    
    /**
     * Gets the Entity Factory
     * 
     * @return EntityFactory
     */
    private function getEntityFactory()
    {
        return EntityFactory::getInstance();
    }
    
    /**
     * Gets the ValueObject Factory
     * 
     * @return ValueObjectFactory
     */
    private function getValueObjectFactory()
    {
        return ValueObjectFactory::getInstance();
    }
    
    /**
     * Gets the Collection Factory
     * 
     * @return CollectionFactory
     */
    private function getCollectionFactory()
    {
        return CollectionFactory::getInstance();
    }
    
    /**
     * Gets the DataAccessObject Factory
     * 
     * @return DaoFactory
     */
    private function getDaoFactory()
    {
        return DaoFactory::getInstance();
    }
    
    /**
     * Creates Entity of the type AggregateRoot and adds it to the Repository's
     * Collection of AggregateRoot
     * 
     * @param array $params
     */
    private function createAggregateRoot($params)
    {
        if($this->collection == null) {
            $this->collection = $this->getCollectionFactory()
                    ->create($this->entityType, $this->entityNamespace, true);
        }
        
        $this->collection->add($this->getEntityFactory()
                ->create($this->entityType, $this->entityNamespace)
                ->initEntity($params));
    }
    
    /**
     * Removes AggregateRoot from the Repository's Collection of AggregateRoots
     * 
     * @param Entity $entity
     */
    private function removeAggregateRoot(Entity $entity)
    {
        if($this->collection === null) {
            $this->collection = $this->getCollectionFactory()
                    ->create($this->entityType, $this->entityNamespace, true);
        }
        
        $this->collection->remove($entity);
    }
    
    /**
     * Creates AggregateEntity and adds it to proper AggregateRoot
     * 
     * Maybe overengineering here?
     * 
     * @param int $aggregateRootId
     * @param string $entityName
     * @param array $params
     * @param string $namespace
     */
    private function createAggregateEntity($aggregateRootId, $entityName, $params, $namespace = "")
    {
        $this->collection->addAggregateEntity(
                $this->getEntityFactory()
                    ->create(
                            $entityName, 
                            ($namespace == ""? $this->entityNamespace : $namespace)
                        )->initEntity($params),
                $aggregateRootId
            );
    }
    
    /**
     * Removes AggregateEntity from proper AggregateRoot
     * 
     * Maybe overengineering here?
     * 
     * @param int $aggregateRootId
     * @param Entity $entity
     */
    private function removeAggregateEntity($aggregateRootId, Entity $entity)
    {
        $this->collection->removeAggregateEntity($entity, $aggregateRootId);
    }
    
    /**
     * Creates AggregateValueObject and add it to proper AggregateRoot
     * 
     * Maybe overengineering here?
     * 
     * @param int $aggregateRootId
     * @param string $valueObjectName
     * @param array $params
     * @param string $namespace
     */
    private function createAggregateValueObject($aggregateRootId, $valueObjectName, $params, $namespace = "")
    {
        $this->collection->addAggregateValueObject(
                $this->getValueObjectFactory()
                    ->create(
                            $valueObjectName, 
                            ($namespace == ""? $this->entityNamespace : $namespace)
                        )->initEntity($params),
                $aggregateRootId
                
            );
    }
    
    /**
     * Removes AggregateValueObject from proper AggregateRoot
     * 
     * maybe overengineering here?
     * 
     * @param int $aggregateRootId
     * @param ValueObject $valueObject
     */
    private function removeAggregateValueObject($aggregateRootId, ValueObject $valueObject)
    {
        $this->collection->removeAggregateValueObject(
                $valueObject,
                $aggregateRootId
            );
    }
    
    /**
     * Having this implementation of getDao due to the constraints of
     * legacy projects. Optimally each repository should use only one DAO
     * fetching Aggregates by joins
     * 
     * @param string $daoClassName
     * @param array $interfaces array containing the names of Interfaces used by DAO
     * @return miexed
     */
    private function getDao($daoClassName, $interfaces = array())
    {
        if(!isset($this->daos[$daoClassName])) {
            $this->daos[$daoClassName] = $this->getDaoFactory()
                    ->create($daoClassName, 
                            FactoryOptions::create()
                                ->setFramework($this->frameworkType)
                                ->setInterfaces($interfaces)
                                ->setNamespace($this->getInfrastructureNamespace()));
        }
        
        return $this->daos[$daoClassName];
    }
}