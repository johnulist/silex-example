<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Domain\Model\User;

use UserInfo\Infrastructure\Domain\Model\DoctrineEntityId;

class DoctrineUserId extends DoctrineEntityId
{
    public function getName()
    {
        return 'UserId';
    }
    
    public function getNamespace()
    {
        return 'UserInfo\Domain\Model\User';
    }
}