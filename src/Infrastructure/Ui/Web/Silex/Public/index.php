<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */
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
$app->get('/{firstname}/{lastname}', function ($firstname, $lastname) use ($app) {
    $user = new User(new UserId(), $firstname, $lastname);
    
    return $app['twig']->render('username.html.twig', array(
            'user' => array(
                'name' => $user->getUserId() . ' ' . $user->getFirstName() . ' ' . $user->getLastName()
            )
        )
    );
})->bind('user');
/*******************/
$app->run();


