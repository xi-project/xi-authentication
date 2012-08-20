<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;
use Xi\DomainUtilities\BaseClasses\Repository;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

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
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * Creates a new Repositroy class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$repositoryName() produces wrong object
     * 
     * @param string $className
     * @param FactoryOptions $options
     * @return Repository
     */
    public function create($className, FactoryOptions $options)
    {
        $fullClassName = $this->validateClass($this->getClassName($className, $options));
        return new $fullClassName($options->getFramework());
    }
}