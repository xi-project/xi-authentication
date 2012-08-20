<?php
namespace Xi\DomainUtilities\Factories;

class RepositoryFactoryTest extends FactoryTestAbstract
{
    public function setUp() 
    {
        RepositoryFactory::setTestInstance($this->getMock("RepositoryFactory"));
        $this->factory = RepositoryFactory::getInstance();
    }
    
    public function testCreateShouldSucceed()
    {
        $this->assertSame(
                "Xi\TestDummies\RepositoryDummy",
                get_class($this->factory->create("RepositoryDummy", "Xi\TestDummies\\"))
            );
        
        $this->getMock("daa");
    }
}