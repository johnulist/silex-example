<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service\User;

use UserInfo\Domain\Model\User\UserId;

class UserRequest
{
    /**
     * @var UserId
     */
    private $id;
    
    public function __construct(UserId $id)
    {
        $this->id = $id;
    }
    
    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }
}