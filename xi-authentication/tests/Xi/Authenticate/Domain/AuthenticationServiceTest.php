<?php
namespace Xi\Authenticate\Domain;

use Xi\Authenticate\Domain\Exception\UserRepositoryUserNotFoundException;

//use Xi\Authenticate\Domain\UserRepository;

use Xi\DomainUtilities\BaseClasses\ServiceTestAbstract;

class AuthenticationServiceTest extends ServiceTestAbstract
{
    
    /**
     * UserRepository Mock
     * 
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $userRepository;
    
    /**
     *
     * @var AuthenticationService AuthenticationService
     */
    protected $service;
    
    public function setUp() 
    {
        parent::setUp();
        $this->userRepository = $this->getMock('Xi\Authenticate\Domain\UserRepository');
        
        $this->createServiceForTests('Xi\Authenticate\Domain\AuthenticationService');
    }
    
    public function expectUserRepository()
    {
        $this->repositoryFactory->expects($this->once())
                ->method('create')
                ->with('UserRepository')
                ->will($this->returnValue($this->userRepository));
    }
    
    public function testGetUserRepository()
    {
        $this->expectUserRepository();
        
        $this->assertSame($this->userRepository, $this->service->getUserRepository());
    }
    
    public function testLoginShouldFailForUserNotFound()
    {        
        $this->userRepository->expects($this->once())
                ->method('findByUsername')
                ->will($this->throwException(new UserRepositoryUserNotFoundException()));
        
        $this->expectUserRepository();
        
        $this->setExpectedException('Xi\Authenticate\Domain\Exception\AuthenticationServiceInvalidUsernameOrPasswordException');
        
        $this->service->login('', '');
    }
    
    
}