<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;
use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class DaoFactory extends AbstractFactory
{
    /**
     * The Framework Specific DataAccessObject Class
     * 
     * @var string 
     */
    private $frameworkClass = "";
    
    protected function __construct() 
    {
        $this->factoryType = "Dao";
        return $this;
    }
    
    /**
     * Implementation of Singleton-pattern so that codecompletion doesn't break
     * 
     * @return DaoFactory
     */
    public static function getInstance() {
        return parent::getInstance();
    }

    protected function validateClass($className)
    {
        if(!class_exists($className)) {
            throw new Exceptions\FactoryInvalidClassException();
        }
        
        if(!in_array($this->frameworkClass, 
                     class_parents($className))) {
            throw new Exceptions\FactoryInvalidInheritanceException();
        }
    }
    
    /**
     * Creates a new Dao class instance
     * 
     * Note, local variable used due to processing priorities of PHP,
     * new $namespace.$daoName() produces wrong object
     * 
     * @param string $className
     * @param FactoryOptions $options
     * @return mixed
     * @throws DaoFactoryUnknownFrameworkException
     */
    public function create($className, FactoryOptions $options)
    {
        switch ($options->getFramework())
        {
            case "ZendFramework":
                $this->frameworkClass = "Zend_Db_Table";
            case "Yii":
                $this->frameworkClass = "CActiveRecord";
            case "Doctrine2":
                $this->frameworkClass = "Doctrine\ORM\EntityRepository";
            case "DummyFramework":
                $this->frameworkClass = "FrameworkDao";
            default :
                throw new DaoFactoryUnknownFrameworkException();
        }
        
        $fullClassName = $this->validateClass($this->getClassName($className, $options));
        
        $dao = new $fullClassName();
        
        if(count($options->getInterfaces()) > 0)
        {
            foreach($options->getInterfaces() as $interface) {
                if(!($dao instanceof $interface)) {
                    throw new DaoFactoryInterfaceNotImplementedException();
                }
            }
        }
        
        return $dao;
    }
}