<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;

class RepositoryFactory extends AbstractFactory
{
    protected function __construct() 
    {
        $this->factoryType = "Repository";
        return $this;
    }
    
    /**
     * Implementation of Singleton-pattern so that codecompletion doesn't break
     * 
     * @return RepositoryFactory
     */
    public static function getInstance() {
        return parent::getInstance();
    }

    /**
     * Creates a new Repositroy class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$repositoryName() produces wrong object
     * 
     * @param string $repositoryName
     * @param string $namespace
     * @return \Xi\DomainUtilities\Factories\Repository
     */
    public function create($repositoryName, $namespace = "", $framework)
    {
        $fullClassName = $namespace.$repositoryName; 
        $this->validateClass($fullClassName);
        
        return new $fullClassName($framework);
    }
}