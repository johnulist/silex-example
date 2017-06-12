<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManager
     */
    public function build($conn)
    {
        Type::addType('UserId', 'UserInfo\Infrastructure\Domain\Model\User\DoctrineUserId');
        
        return EntityManager::create($conn, Setup::createYAMLMetadataConfiguration([__DIR__ . '/Mapping'], true));
    }
}