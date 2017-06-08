<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Domain\Model\User;

use Ramsey\Uuid\Uuid;

class UserId
{
    /**
     * @var string
     */
    private $id;
    
    public function __construct($id = null)
    {
        $this->id = (null == $id) ? Uuid::uuid4()->toString() : $id;
    }
    
    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
    
    /**
     * @param UserId $userId
     * @return bool
     */
    public function equals(UserId $userId){
        return $this->id() === $userId->id();
    }
    
    public function __toString()
    {
        return $this->id();
    }
}