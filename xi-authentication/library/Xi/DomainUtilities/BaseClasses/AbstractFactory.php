<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\Exceptions as Exceptions;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

abstract class AbstractFactory
{
    protected $factoryType = null;
    
    protected function validateClass($className)
    {
        if(!class_exists($className)) {
            throw new Exceptions\FactoryInvalidClassException($className);
        }
        
        if(!in_array('Xi\\DomainUtilities\\BaseClasses\\'.$this->factoryType, 
                     class_parents($className))) {
            throw new Exceptions\FactoryInvalidInheritanceException($className, $this->factoryType);
        }
        
        return $className;
    }
    
    abstract public function create($className, FactoryOptions $options);
    
    /**
     * Return class name with namespace
     * 
     * @param string $className
     * @param FactoryOptions $options
     * @return string
     */
    final protected function getClassName($className, FactoryOptions $options)
    {
        return $options->getNamespace().$className;
    }
}