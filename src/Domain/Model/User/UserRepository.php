<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Domain\Model\User;

interface UserRepository
{
    /**
     * @param UserId $userId
     * @return User
     */
    public function ofId(UserId $userId);
    
    /**
     * @param string $firstname
     * @param string $lastname
     * @return User
     */
    public function ofFirstNameAndLastName($firstname, $lastname);
    
    /**
     * @param User $user
     */
    public function add(User $user);
    
    /**
     * @return UserId
     */
    public function nextIdentity();
}