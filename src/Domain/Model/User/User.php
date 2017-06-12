<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Domain\Model\User;

class User
{
    /**
     * @var UserId
     */
    protected $userId;
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var string
     */
    protected $lastName;
    
    /**
     * User constructor.
     * @param UserId $userId
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(UserId $userId, $firstName, $lastName)
    {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }
    
    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}