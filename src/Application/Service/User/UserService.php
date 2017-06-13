<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service\User;

use UserInfo\Application\Service\ApplicationService;
use UserInfo\Domain\Model\User\UserRepository;

abstract class UserService implements ApplicationService
{
    protected $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    protected function findUser($firstName, $lastName)
    {
        return $this->userRepository->ofFirstNameAndLastName($firstName, $lastName);
    }
    
    protected function findById($id)
    {
        return $this->userRepository->ofId($id);
    }
}