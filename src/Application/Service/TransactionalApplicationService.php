<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service;

class TransactionalApplicationService implements ApplicationService
{
    /**
     * @var TransactionalSession
     */
    private $session;
    /**
     * @var ApplicationService
     */
    private $service;
    
    public function __construct(ApplicationService $service, TransactionalSession $session)
    {
        $this->service = $service;
        $this->session = $session;
    }
    
    public function execute($request = null)
    {
        if (empty($this->service)) {
            throw new \LogicException('A use case must be specified');
        }
        $operation = function () use ($request) {
            return $this->service->execute($request);
        };
        
        return $this->session->executeAtomically($operation);
    }
}