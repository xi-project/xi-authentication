<?php
namespace Xi\DomainUtilities\Factories;

class RepositoryFactoryTest extends FactoryTestAbstract
{
    public function setUp() 
    {
        
    }
    
    public function testCreateShouldSucceed()
    {
        $this->assertSame(
                "Xi\TestDummies\RepositoryDummy",
                get_class(RepositoryFactory::getInstance()->create("RepositoryDummy", "Xi\TestDummies\\"))
            );
    }
}