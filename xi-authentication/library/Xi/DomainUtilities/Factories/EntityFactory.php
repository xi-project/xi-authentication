<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

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
    public static function getInstance() 
    {
        return parent::getInstance();
    }

    /**
     * Creates a new Entity class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$entityName() produces wrong object
     * 
     * @param string $className
     * @param FactoryOptions $options
     * @return Entity
     */
    public function create($className, FactoryOptions $options)
    {
        $fullClassName = $this->validateClass($this->getClassName($className, $options));
        
        return new $fullClassName();
    }
}