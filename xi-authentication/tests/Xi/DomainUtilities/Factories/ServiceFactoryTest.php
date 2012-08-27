<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\Factories\ServiceFactory;
use Xi\DomainUtilities\Factories\RepositoryFactory;

use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class ServiceFactoryTest extends FactoryTestAbstract
{
    public function setUp() 
    {
        $this->factory = new ServiceFactory(new RepositoryFactory());
    }
    
    public function testCreateShouldSucceed()
    {
        $this->assertSame(
                "Xi\TestDummies\ServiceDummy",
                get_class($this->factory
                        ->create(
                                "ServiceDummy", 
                                FactoryOptions::create()
                                    ->setNamespace("Xi\TestDummies\\"))
                )
            );
    }
}