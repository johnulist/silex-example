<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */
use UserInfo\Application\Service\User\AddUserRequest;
use UserInfo\Application\Service\User\UserRequest;
use UserInfo\Domain\Model\User\User;
use UserInfo\Domain\Model\User\UserId;

$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}
error_reporting(E_ALL);
require_once __DIR__ . '/../../../../../../vendor/autoload.php';
$app = \UserInfo\Infrastructure\Ui\Web\Silex\Application::bootstrap();
/*******************/
$app->get('/', function () use ($app) {
    return $app['twig']->render('layout.html.twig');
})->bind('home');
/*******************/
$app->get('/id/{id}', function ($id) use ($app) {
    /**@var $user User */
    $user = $app['view_user_application_service']->execute(
        new UserRequest(new UserId($id))
    );
    
    return $app['twig']->render('username.html.twig', array(
            'user' => array(
                'name' => ' Usuario recuperado: ' . $user->getFirstName() . ' ' . $user->getLastName()
            )
        )
    );
})->bind('user_view');
/*******************/
$app->get('/add/{firstname}/{lastname}', function ($firstname, $lastname) use ($app) {
    $app['add_user_application_service']->execute(
        new AddUserRequest($firstname, $lastname)
    );
    
    return $app['twig']->render('username.html.twig', array(
            'user' => array(
                'name' => ' Usuario añadido: ' . $firstname . ' ' . $lastname
            )
        )
    );
})->bind('user_add');
/*******************/
$app->run();


