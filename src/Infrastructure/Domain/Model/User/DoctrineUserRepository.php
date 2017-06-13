<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Domain\Model\User;

use Doctrine\ORM\EntityRepository;
use UserInfo\Domain\Model\User\User;
use UserInfo\Domain\Model\User\UserId;
use UserInfo\Domain\Model\User\UserRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    public function ofId(UserId $userId)
    {
        return $this->find($userId);
    }
    
    public function ofFirstNameAndLastName($firstName, $lastName)
    {
        return $this->findOneBy(['firstName' => $firstName, 'lastName' => $lastName]);
    }
    
    /**
     * @param User $user
     */
    public function add(User $user)
    {
        $this->getEntityManager()->persist($user);
    }
    
    public function nextIdentity()
    {
        return new UserId();
    }
}