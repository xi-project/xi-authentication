<?php
namespace Xi\DomainUtilities\Factories;

use PHPUnit_Framework_TestCase;

class FactoryTestAbstract extends PHPUnit_Framework_TestCase
{
    public function setUp() 
    {
        
    }
    
    public function testCreateShouldFailForInvalidClassException()
    {
        $this->setExpectedException(
                "Xi\DomainUtilities\BaseClasses\Exceptions\FactoryInvalidClassException"
        );
        $this->factory->create("InvalidClass", "");
    }
    
    public function testCreateShouldFailForInvalidInheritanceException()
    {
        $this->setExpectedException(
                "Xi\DomainUtilities\BaseClasses\Exceptions\FactoryInvalidInheritanceException"
            );
        $this->factory->create("Dummy", "Xi\TestDummies\\");
    }
}
    