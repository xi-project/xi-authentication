<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\Factories\RepositoryFactory;

abstract class Service
{
    protected $repositories;
    
    /**
     * 
     * @return RepositoryFactory
     */
    protected function getRepositoryFactory()
    {
        return RepositoryFactory::getInstance();
    }
    
    /**
     * 
     * @param string $repositoryName
     * @return Repository
     */
    protected function getRepository($repositoryName)
    {
        if(!isset($this->repositories[$repositoryName])) {
            $this->repositories[$repositoryName] = 
                    $this->getRepositoryFactory()->create($repositoryName);
        }
        
        return $this->repositories[$repositoryName];
    }
}