<?php
namespace Xi\DomainUtilities\BaseClasses;

use Xi\DomainUtilities\BaseClasses\Adapters\ExceptionResponseAdapter;
use Xi\DomainUtilities\BaseClasses\Adapters\TranslationAdapter;

use Xi\DomainUtilities\BaseClasses\Exceptions\InvalidAdapterException;

use Xi\DomainUtilities\BaseClasses\DomainBase;

use Xi\DomainUtilities\Factories\RepositoryFactory;

use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

abstract class Service extends DomainBase
{
    /**
     * The ExceptionResponseAdapter for handling service exception responses
     * 
     * @var ExceptionResponseAdapter 
     */
    protected $exceptionResponseAdapter;
    
    /**
     * TranslationAdapter for handling translations
     * 
     * @var TranslationAdaper 
     */
    protected $translasitonAdapter;


    /**
     * Array containing all the repositories a Service needs
     * 
     * @var array 
     */
    protected $repositories;
    
    /**
     * RepositoryFactory to create the Repositories for the Service
     * 
     * @var RepositoryFactory 
     */
    protected $repositoryFactory = null;
    
    /**
     * The namespace name of the infrastructure objects
     * 
     * @var string 
     */
    protected $infraNamespace;
    
    public function __construct(RepositoryFactory $repositoryFactory)
    {
        $this->repositoryFactory = $repositoryFactory;
    }
    
    public function setTranslationAdapter($translationAdapter = null)
    {
        if($translationAdapter != null) {
            if (! ($translationAdapter instanceof TranslationAdapter)) {
                throw new InvalidAdapterException('TranslationAdapter', get_called_class());
            }
            $this->translasitonAdapter = $translationAdapter;
        }
        else {
            $this->translasitonAdapter = new TranslationAdapter();
        }
    }

    public function setExceptionResponseAdapter($exceptionResponseAdapter = null)
    {
        
        if ($exceptionResponseAdapter != null) {
            if (! ($exceptionResponseAdapter instanceof ExceptionResponseAdapter)) {
                throw new InvalidAdapterException('ExceptionResponseAdapter', get_called_class());
            }
            $this->exceptionResponseAdapter = $exceptionResponseAdapter;
        }
        else {
            $this->exceptionResponseAdapter = new ExceptionResponseAdapter();
        }
        $this->exceptionResponseAdapter->setTranslationAdapter($this->translasitonAdapter);
    }

    /**
     * 
     * @return RepositoryFactory
     */
    private function getRepositoryFactory()
    {
        return $this->repositoryFactory;
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