<?php
namespace Xi\TestDummies;

class FrameworkDao implements IGetDummyId, IGetDummyProperty, IFetchSomethingById, IFetchingElseById
{
    protected $data;
    
    protected $currentRowId;
    
    protected $someDaoProertyOrDbColumnRow;

    /**
     * Example of managing persistance with "table object"-type of solution
     * 
     * @param type $someId
     * @return \Xi\TestDummies\FrameworkDao
     */
    public function fetchSomethingById($someId) 
    {
        if(!isset($this->dataRows[$someId])) {
            $this->holdData($someId);
        }
        $this->someDaoProertyOrDbColumnRow = $this->dataRows[$this->currentRowId]['someProperty'];
        return $this;
    }
    
    /**
     * Example of managing persistance with "entity manager"-type of solution
     * 
     * @param int $someId
     * @return \Xi\TestDummies\DaoRowContainerDummy
     */
    public function fetchSomethingElseById($someId)
    {
        $this->holdData($someId);
        return new DaoRowContainerDummy($this->currentRowId, $this->data['someProperty']);
    }
    
    private function holdData($someId)
    {
        $this->currentRowId = $someId;
        $this->dataRows[$someId]['someProperty'] = "Hello World";
        $this->dataRows[$someId]['anotherProperty'] = "Hello Another World";
    }
    
    public function getDummyProperty() 
    {
        return $this->someDaoProertyOrDbColumnRow;
    }
    
    public function getDummyId() 
    {
        return $this->currentRowId;
    }
}