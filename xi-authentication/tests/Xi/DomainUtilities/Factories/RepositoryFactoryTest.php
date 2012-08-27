<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\Factories\RepositoryFactory;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class RepositoryFactoryTest extends FactoryTestAbstract
{
    public function setUp() 
    {
        $this->factory = new RepositoryFactory();
    }
    
    public function testCreateShouldSucceed()
    {
        $this->assertSame(
                "Xi\TestDummies\RepositoryDummy",
                get_class($this->factory
                        ->create(
                                "RepositoryDummy", 
                                FactoryOptions::create()
                                    ->setNamespace("Xi\TestDummies\\"))
                )
            );
    }
}