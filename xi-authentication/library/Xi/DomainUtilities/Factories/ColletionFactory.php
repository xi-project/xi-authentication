<?php
namespace Xi\DomainUtilities\Factories;

use PHPUnit_Framework_MockObject_MockObject;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;
use Xi\DomainUtilities\BaseClasses\Collection;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class CollectionFactory extends AbstractFactory
{
    protected function __construct() 
    {
        return $this;
    }
    
    /**
     * Implementation of Singleton-pattern so that codecompletion doesn't break
     * 
     * @return CollectionFactory
     */
    protected static function getInstance() 
    {
        return parent::getInstance();
    }
    
    /**
     * Creates a new Collection class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$collectionName() produces wrong object
     * 
     * @param string $className
     * @param FactoryOptions $options
     * @return Collection
     */
    public function create($className, FactoryOptions $options)
    {
        $this->factoryType = ($options->isRepositoryCollection()? "RepositoryCollection" : "Collection");
        
        $fullClassName = $this->validateClass(
                $this->getClassName($className, $options)
            );
        
        
        return new $fullClassName();
    }
}