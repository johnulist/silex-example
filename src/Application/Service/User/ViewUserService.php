<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service\User;

use UserInfo\Application\Service\ApplicationService;

class ViewUserService extends UserService implements ApplicationService
{
    public function execute($request = null)
    {
        /**@var $request UserRequest */
        return $this->findById($request->id());
    }
}