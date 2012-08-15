<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;

class CollectionFactory extends AbstractFactory
{
    protected function __construct() 
    {
        $this->factoryType = "Collection";
        return $this;
    }
    
    /**
     * Implementation of Singleton-pattern so that codecompletion doesn't break
     * 
     * @return CollectionFactory
     */
    public static function getInstance() {
        return parent::getInstance();
    }

    public function validateClass($className) {
        parent::validateClass($className);
        
        if(!in_array('Xi\\DomainUtilities\\BaseClasses\\Repository'.$this->factoryType, 
                     class_parents($className))) {
            throw new Exceptions\FactoryInvalidInheritanceException();
        }
    }
    /**
     * Creates a new Collection class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$collectionName() produces wrong object
     * 
     * @param string $collectionName
     * @param string $namespace
     * @return \Xi\DomainUtilities\Factories\Collection
     */
    public function create($collectionName, $namespace = "", $repositoryCollection = false)
    {
        $fullClassName = $namespace.$collectionName; 
        $this->validateClass($fullClassName, $repositoryCollection);
        
        return new $fullClassName();
    }
}