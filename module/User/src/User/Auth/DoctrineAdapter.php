<?php

namespace User\Auth;

use Doctrine\ORM\EntityManager;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class DoctrineAdapter implements AdapterInterface 
{
    protected $em;
    protected $username;
    protected $password;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function authenticate()
    {
        $repository = $this->em->getRepository("User\Entity\User");
        $user = $repository->findOneBy(array(
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
        ));
        
        if($user) {
            return new Result(Result::SUCCESS, array('user' => $user), array('OK'));
        } else {
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
        }
    }
    
    public function getUsername() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setUsername($user) {
        $this->user = $user;
        
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        
        return $this;
    }


}
