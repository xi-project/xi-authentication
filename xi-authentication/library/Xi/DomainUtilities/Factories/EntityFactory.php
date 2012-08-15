<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;

class EntityFactory extends AbstractFactory
{
    protected function __construct() 
    {
        $this->factoryType = "Entity";
        return $this;
    }
    
    /**
     * Implementation of Singleton-pattern so that codecompletion doesn't break
     * 
     * @return EntityFactory
     */
    public static function getInstance() {
        return parent::getInstance();
    }

    /**
     * Creates a new Entity class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$entityName() produces wrong object
     * 
     * @param string $entityName
     * @param string $namespace
     * @return \Xi\DomainUtilities\Factories\Entity
     */
    public function create($entityName, $namespace = "")
    {
        $fullClassName = $namespace.$entityName; 
        $this->validateClass($fullClassName);
        
        return new $fullClassName();
    }
}