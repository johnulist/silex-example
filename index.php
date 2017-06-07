<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */
require_once __DIR__ . '/vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;
$userInfo = array(
    '1' => array(
        'Nombre' => 'Marcos',
        'Apellidos' => 'Redondo'
    ),
    '2' => array(
        'Nombre' => 'Pedro',
        'Apellidos' => 'Romero'
    ),
    '3' => array(
        'Nombre' => 'Maria',
        'Apellidos' => 'Vazquez'
    )
);
$app->get('/', function () use ($userInfo) {
    $output = '';
    foreach ($userInfo as $user) {
        $output .= "Nombre y apellidos : " . $user['Nombre'] . " " . $user['Apellidos'];
        $output .= "<br />";
    }
    
    return $output;
});
$app->run();


