<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;

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
    public static function getInstance() {
        return parent::getInstance();
    }

    /**
     * Creates an instance of class Service
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$serviceName() produces wrong object
     * 
     * @param string $serviceName
     * @param string $namespace
     * @return \Xi\DomainUtilities\Factories\Service
     */
    public function create($serviceName, $namespace = "")
    {
        $fullClassName = $namespace.$serviceName; 
        $this->validateClass($fullClassName);
        
        return new $fullClassName();
    }
}