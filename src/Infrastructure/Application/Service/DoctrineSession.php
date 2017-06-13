<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Application\Service;

use Doctrine\ORM\EntityManager;
use UserInfo\Application\Service\TransactionalSession;

class DoctrineSession implements TransactionalSession
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function executeAtomically(callable $operation)
    {
        return $this->entityManager->transactional($operation);
    }
}