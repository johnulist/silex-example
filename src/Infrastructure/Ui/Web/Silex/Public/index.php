<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
// Get User
$app->get('/id/{id}', 'UserInfo\\Application\\Controller\\UserController::getUser');
/*******************/
// Add User
$app->get('/add/{firstname}/{lastname}', 'UserInfo\\Application\\Controller\\UserController::addUser');
/*******************/
// Error Handlers
$app->error(function (\Exception $e, Request $request, $code) {
    switch ($code) {
        case 404:
            $message = "The requested page could not be found";
            break;
        default:
            $message = "We are sorry, but something went wrong";
    }
    
    return new Response($message);
});
/*******************/
// Run app
$app->run();



