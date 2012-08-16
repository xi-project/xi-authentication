<?php
namespace Xi\DomainUtilities\Factories;

use Xi\DomainUtilities\BaseClasses\AbstractFactory;

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

    protected function validateClass($className, $interfaces)
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
     * @param type $daoName
     * @param type $namespace
     * @param type $frameworkClass
     * @param type $interfaces
     * @return \Xi\DomainUtilities\Factories\fullClassName
     * @throws DaoFactoryUnknownFrameworkException
     */
    public function create($daoName, $namespace = "", $frameworkClass = "", $interfaces = array())
    {
        $fullClassName = $namespace.$daoName; 
        
        switch ($frameworkClass)
        {
            case "ZendFramework":
                $this->frameworkClass = "Zend_Db_Table";
            case "Yii":
                $this->frameworkClass = "CActiveRecord";
            case "Doctrine2":
                $this->frameworkClass = "Doctrine\ORM\EntityRepository";
            default :
                throw new DaoFactoryUnknownFrameworkException();
        }
        
        $this->validateClass($fullClassName, $interfaces);
        
        $dao = new $fullClassName();
        
        if(count($interfaces) > 0)
        {
            foreach($interfaces as $interface) {
                if(!($dao instanceof $interface)) {
                    throw new DaoFactoryInterfaceNotImplementedException();
                }
            }
        }
        
        return $dao;
    }
}