<?php

namespace Xi\TestDummies;

class DaoRowContainerDummy implements IGetDummyProperty
{
    private $dummyProperty;
    
    public function __construct($dummyProperty) 
    {
        $this->dummyProperty = $dummyProperty;
    }
    
    public function getDummyProperty()
    {
        return $this->dummyProperty;
    }
}