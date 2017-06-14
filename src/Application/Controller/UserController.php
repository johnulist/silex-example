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
    
    public function getUserHome(Request $request, Application $app)
    {
        return $app['twig']->render('user-form.html.twig', array('route' => '/user/add'));
    }
    
    public function addUser(Request $request, Application $app)
    {
        if ($request->isMethod('POST')) {
            $firstName = $request->request->get("firstname");
            $lastName = $request->request->get("lastname");
            $app['add_user_application_service']->execute(
                new AddUserRequest($firstName, $lastName)
            );
            $message = ' Usuario añadido: ' . $firstName . ' ' . $lastName;
            
            return $app['twig']->render('username.html.twig', array(
                    'user' => array(
                        'name' => $message
                    )
                )
            );
        }
        
        return $app->redirect('/user');
    }
}