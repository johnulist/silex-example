<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Service\User;

use UserInfo\Domain\Model\User\User;
use UserInfo\Domain\Model\User\UserId;

class AddUserService extends UserService
{
    public function execute($request = null)
    {
        /**@var $request AddUserRequest */
        $firstname = $request->firstName();
        $lastname = $request->lastName();
        $user = $this->findUser($firstname, $lastname);
        if (null === $user) {
            $this->userRepository->add(new User(new UserId(), $firstname, $lastname));
        }
    }
}