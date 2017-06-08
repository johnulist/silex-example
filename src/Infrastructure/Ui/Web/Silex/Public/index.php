<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}
error_reporting(E_ALL);
require_once __DIR__ . '/../../../../../../vendor/autoload.php';
$app = \UserInfo\Infrastructure\Ui\Web\Silex\Application::bootstrap();
$userInfo = array(
    '1' => array(
        'firstName' => 'Marcos',
        'lastName' => 'Redondo',
    ),
    '2' => array(
        'firstName' => 'Pedro',
        'lastName' => 'Romero'
    ),
    '3' => array(
        'firstName' => 'Maria',
        'lastName' => 'Vazquez'
    )
);
$app->get('/', function () use ($app) {
    return $app['twig']->render('layout.html.twig');
})->bind('home');
$app->run();


