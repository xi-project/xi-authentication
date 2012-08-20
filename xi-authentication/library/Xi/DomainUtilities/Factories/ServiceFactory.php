<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;
use Xi\DomainUtilities\BaseClasses\Service;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class ServiceFactory extends AbstractFactory
{
    protected function __construct() 
    {
        $this->factoryType = "Service";
        return $this;
    }
    
    /**
     * Implementation of Singleton-pattern so that codecompletion doesn't break
     * 
     * @return ServiceFactory
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * Creates an instance of class Service
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$serviceName() produces wrong object
     * 
     * @param string $className
     * @param FactoryOptions $options
     * @return Service
     */
    public function create($className, FactoryOptions $options)
    {
        $fullClassName = $this->validateClass($this->getClassName($className, $options));
        
        return new $fullClassName();
    }
}