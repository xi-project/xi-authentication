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
    public function create($collectionName, $namespace = "")
    {
        $fullClassName = $namespace.$collectionName; 
        $this->validateClass($fullClassName);
        
        return new $fullClassName();
    }
}