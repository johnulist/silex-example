<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service\User;

use UserInfo\Application\Service\ApplicationService;
use UserInfo\Domain\Model\User\UserDoesNotExistException;

class ViewUserService extends UserService implements ApplicationService
{
    public function execute($request = null)
    {
        /**@var $request UserRequest */
        $user = $this->findById($request->id());
        if (null === $user) {
            throw new UserDoesNotExistException();
        }
    }
}