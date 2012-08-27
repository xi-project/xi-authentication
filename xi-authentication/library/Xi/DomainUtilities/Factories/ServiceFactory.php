<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;
use Xi\DomainUtilities\BaseClasses\Service;

use Xi\DomainUtilities\Factories\RepositoryFactory;

use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class ServiceFactory extends AbstractFactory
{
    /**
     * RepositoryFactory for the Services to create Repositories they need
     * 
     * @var RepositoryFactory 
     */
    private $repositoryFactory;
    
    public function __construct(RepositoryFactory $repositoryFactory) 
    {
        $this->factoryType = "Service";
        $this->repositoryFactory = $repositoryFactory;
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
        
        $service = new $fullClassName($this->repositoryFactory);
        
        $this->initService($service, $options);
        
        return $service;
    }
    
    public function initService(Service $service, FactoryOptions $options)
    {
        $service->setTranslationAdapter($options->getTranslationAdapter());
        $service->setExceptionResponseAdapter($options->getExceptionResponseAdapter());
    }
}