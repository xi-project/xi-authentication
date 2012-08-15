<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;

class ValueObjectFactory extends AbstractFactory
{
    protected function __construct() 
    {
        $this->factoryType = "ValueObject";
        return $this;
    }
    
    /**
     * Implementation of Singleton-pattern so that codecompletion doesn't break
     * 
     * @return ValueObjectFactory
     */
    public static function getInstance() {
        return parent::getInstance();
    }

    /**
     * Creates a new ValueObject class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$valueObjectName() produces wrong object
     * 
     * @param string $valueObjectName
     * @param string $namespace
     * @return \Xi\DomainUtilities\Factories\ValueObject
     */
    public function create($valueObjectName, $namespace = "")
    {
        $fullClassName = $namespace.$valueObjectName; 
        $this->validateClass($fullClassName);
        
        return new $fullClassName();
    }
}