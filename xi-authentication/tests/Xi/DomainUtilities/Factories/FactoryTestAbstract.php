<?php
namespace Xi\DomainUtilities\Factories;

use PHPUnit_Framework_TestCase;

use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

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
        $this->factory->create(
                "InvalidClass", 
                FactoryOptions::create()
                    ->setNamespace("Xi\TestDummies\\"));
    }
    
    public function testCreateShouldFailForInvalidInheritanceException()
    {
        $this->setExpectedException(
                "Xi\DomainUtilities\BaseClasses\Exceptions\FactoryInvalidInheritanceException"
            );
        $this->factory->create(
                "Dummy", 
                FactoryOptions::create()
                    ->setNamespace("Xi\TestDummies\\"));
    }
}
    