<?php
namespace Xi\Authenticate\Domain;

use Xi\DomainUtilities\BaseClasses\Service;

class AuthenticationService extends Service
{
    public function __construct() 
    {
        
    }
    
    public function getUserRepository()
    {
        
        return $this->getRepository('User');
    }
}