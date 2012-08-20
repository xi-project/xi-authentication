<?php
namespace Xi\DomainUtilities\BaseClasses;

use PHPUnit_Framework_MockObject_MockObject;

use Xi\DomainUtilities\BaseClasses\Exceptions as Exceptions;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

abstract class AbstractFactory
{
    private static $instances = array();
    
    protected $factoryType = null;
    
    abstract protected function __construct();
    
    /**
     * 
     * @return AbstractFactory An instance object of a factory that extends AbstractFactory
     */
    protected static function getInstance()
    {
        $className = get_called_class();
        
        if(!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className();
        }
        
        return self::$instances[$className];
    }
    
    /**
     * 
     * @param PHPUnit_Framework_MockObject_MockObject $mockObject Used only for testing!
     * @return AbstractFactory An instance object of a factory that extends AbstractFactory
     */
    public static function setTestInstance(PHPUnit_Framework_MockObject_MockObject $mockObject)
    {
        self::$instances[$className] = $mockObject;
    }
    
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