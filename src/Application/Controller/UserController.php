<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Application\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use UserInfo\Application\Service\User\AddUserRequest;
use UserInfo\Application\Service\User\UserRequest;
use UserInfo\Domain\Model\User\User;
use UserInfo\Domain\Model\User\UserId;

class UserController
{
    public function getUser(Request $request, Application $app)
    {
        /**@var $user User */
        $user = $app['view_user_application_service']->execute(
            new UserRequest(new UserId($request->attributes->get("id")))
        );
        
        return $app['twig']->render('username.html.twig', array(
                'user' => array(
                    'name' => ' Usuario recuperado: ' . $user->getFirstName() . ' ' . $user->getLastName()
                )
            )
        );
    }
    
    public function addUser(Request $request, Application $app)
    {
        $firstName = $request->attributes->get("firstname");
        $lastName = $request->attributes->get("firstname");
        $app['add_user_application_service']->execute(
            new AddUserRequest($firstName, $lastName)
        );
        
        return $app['twig']->render('username.html.twig', array(
                'user' => array(
                    'name' => ' Usuario añadido: ' . $firstName . ' ' . $lastName
                )
            )
        );
    }
}