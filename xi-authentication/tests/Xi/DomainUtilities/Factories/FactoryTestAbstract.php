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
        ServiceFactory::getInstance()->create("InvalidClass", "");
    }
    
    public function testCreateShouldFailForInvalidInheritanceException()
    {
        $this->setExpectedException(
                "Xi\DomainUtilities\BaseClasses\Exceptions\FactoryInvalidInheritanceException"
            );
        ServiceFactory::getInstance()->create("Dummy", "Xi\TestDummies\\");
    }
}
    