<?php
namespace Xi\Authenticate\Domain;

use Xi\Authenticate\Domain\Exception\AuthenticationServiceInvalidUsernameOrPasswordException;
use Xi\Authenticate\Domain\Exception\AuthenticationServiceException;
use Xi\Authenticate\Domain\Exception\UserRepositoryException;

use Xi\Authenticate\Domain\UserRepository;

use Xi\DomainUtilities\BaseClasses\Service;

use Xi\DomainUtilities\Factories\RepositoryFactory;

use Xi\DomainUtilities\Factories\FactoryOptions\FactoryOptions;

class AuthenticationService extends Service
{
    public function __construct(RepositoryFactory $repositoryFactory) 
    {
        parent::__construct($repositoryFactory);
    }
    
    public function getUserRepository()
    {
        if(!isset($this->repositories['User'])) {
            $this->repositories['User'] = $this->repositoryFactory
                    ->create(
                            'UserRepository',
                            FactoryOptions::create()
                        );
        }
        
        return $this->repositories['User'];
    }
    
    public function login($username, $password)
    {
        try {
            $this->user = $this->getUserRepository()->findByUserName($username);
        }
        catch(UserRepositoryException $e)
        {
            throw new AuthenticationServiceInvalidUsernameOrPasswordException($this->exceptionResponseAdapter, $e);
        }
    }
}