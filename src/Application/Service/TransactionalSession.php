<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service;

interface TransactionalSession
{
    /**
     * @param callable $operation
     * @return mixed
     */
    public function executeAtomically(callable $operation);
}