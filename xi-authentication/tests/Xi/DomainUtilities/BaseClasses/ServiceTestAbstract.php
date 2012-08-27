<?php
namespace Xi\DomainUtilities\BaseClasses;

use PHPUnit_Framework_TestCase;

use Xi\DomainUtilities\BaseClasses\Adapters\TranslationAdapter;
use Xi\DomainUtilities\BaseClasses\Adapters\ExceptionResponseAdapter;

use Xi\DomainUtilities\BaseClasses\Exceptions\InvalidAdapterException;

use Xi\DomainUtilities\BaseClasses\Service;

use Xi\DomainUtilities\Factories\ServiceFactory;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

abstract class ServiceTestAbstract extends PHPUnit_Framework_TestCase
{
    /**
     * RepositoryFactory Mock
     * 
     * @var PHPUnit_Framework_MockObject_MockObject 
     */
    protected $repositoryFactory;
    
    /**
     * ServiceFactory for creating the service
     * 
     * @var ServiceFactory 
     */
    protected $serviceFactory;
    
    /**
     * Service to be tested
     * 
     * @var Service 
     */
    protected $service;
    
    public function setUp() 
    {
        $this->repositoryFactory = $this->getMock('Xi\DomainUtilities\Factories\RepositoryFactory');
        $this->serviceFactory = new ServiceFactory($this->repositoryFactory);
    }
    
    public function createServiceForTests($fullClassName)
    {
        $this->service = new $fullClassName($this->repositoryFactory);
        $this->service->setTranslationAdapter(new TranslationAdapter());
        $this->service->setExceptionResponseAdapter(new ExceptionResponseAdapter());
    }
    
    public function testServiceShouldFailForInvalidTranslationAdapter()
    {
        $this->setExpectedException('Xi\DomainUtilities\BaseClasses\Exceptions\InvalidAdapterException');
        $this->service->setTranslationAdapter(new ExceptionResponseAdapter());
    }
}