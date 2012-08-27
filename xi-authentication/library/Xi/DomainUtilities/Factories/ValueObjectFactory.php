<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;
use Xi\DomainUtilities\BaseClasses\ValueObject;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class ValueObjectFactory extends AbstractFactory
{
    public function __construct() 
    {
        $this->factoryType = "ValueObject";
    }

    /**
     * Creates a new ValueObject class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$valueObjectName() produces wrong object
     * 
     * @param string $className
     * @param FactoryOptions $options
     * @return ValueObject
     */
    public function create($className, FactoryOptions $options)
    {
        $fullClassName = $this->validateClass($this->getClassName($className, $options));
        
        return new $fullClassName();
    }
}