<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\Factories\EntityFactory;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class EntityFactoryTest extends FactoryTestAbstract
{
    public function setUp() 
    {
        $this->factory = new EntityFactory;;
    }
    
    public function testCreateShouldSucceed()
    {
        $this->assertSame(
                "Xi\TestDummies\EntityDummy",
                get_class($this->factory
                        ->create(
                                "EntityDummy", 
                                FactoryOptions::create()
                                    ->setNamespace("Xi\TestDummies\\"))
                )
            );
    }
}