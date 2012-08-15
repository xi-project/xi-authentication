<?php
namespace Xi\DomainUtilities\Factories;

class EntityFactoryTest extends FactoryTestAbstract
{
    public function setUp() 
    {
        
    }
    
    public function testCreateShouldSucceed()
    {
        $this->assertSame(
                "Xi\TestDummies\EntityDummy",
                get_class(EntityFactory::getInstance()->create("EntityDummy", "Xi\TestDummies\\"))
            );
    }
}