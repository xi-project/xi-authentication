<?php
namespace Xi\DomainUtilities\Factories;

class ServiceFactoryTest extends FactoryTestAbstract
{
    public function setUp() 
    {
        
    }
    
    public function testCreateShouldSucceed()
    {
        $this->
        $this->assertSame(
                "Xi\TestDummies\ServiceDummy",
                get_class(ServiceFactory::getInstance()->create("ServiceDummy", "Xi\TestDummies\\"))
            );
    }
}