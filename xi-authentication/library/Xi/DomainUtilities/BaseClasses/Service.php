<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\DomainBase;

use Xi\DomainUtilities\Factories\RepositoryFactory;

use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

abstract class Service extends DomainBase
{
    protected $repositories;
    protected $infraNamespace;
    
    /**
     * 
     * @return RepositoryFactory
     */
    private function getRepositoryFactory()
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
                    $this->getRepositoryFactory()->create(
                            $repositoryName, 
                            FactoryOptions::create()
                                ->setNamespace($this->getDomainNamespace()));
        }
        
        return $this->repositories[$repositoryName];
    }
}