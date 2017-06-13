<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service\User;

class AddUserRequest
{
    private $firstName;
    private $lastName;
    
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    /**
     * @return mixed
     */
    public function firstName()
    {
        return $this->firstName;
    }
    
    /**
     * @return mixed
     */
    public function lastName()
    {
        return $this->lastName;
    }
}