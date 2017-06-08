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
    private $userId;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    
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
}