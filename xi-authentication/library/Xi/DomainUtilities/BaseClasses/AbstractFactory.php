<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\Exceptions as Exceptions;

abstract class AbstractFactory
{
    private static $instances = array();
    
    protected $factoryType = null;
    
    abstract protected function __construct();
    
    protected static function getInstance($mockObject = null)
    {
        $className = get_called_class();
        
        if(!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className();
        }
        elseif ($mockObject != null 
                && in_array("PHPUnit_Framework_MockObject_MockObject", class_parents($mockObject))) {
            self::$instances[$className] = $mockObject;
        }
        
        return self::$instances[$className];
    }
    
    protected function validateClass($className)
    {
        if(!class_exists($className)) {
            throw new Exceptions\FactoryInvalidClassException();
        }
        
        if(!in_array('Xi\\DomainUtilities\\BaseClasses\\'.$this->factoryType, 
                     class_parents($className))) {
            throw new Exceptions\FactoryInvalidInheritanceException();
        }
    }
}