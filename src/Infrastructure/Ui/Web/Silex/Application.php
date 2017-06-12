<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Ui\Web\Silex;

use Silex\Provider;
use Silex\Provider\TwigServiceProvider;
use UserInfo\Infrastructure\Persistence\Doctrine\EntityManagerFactory;

class Application
{
    public static function bootstrap()
    {
        $app = new \Silex\Application();
        $app['debug'] = true;
        $app['em'] = function ($app) {
            return (new EntityManagerFactory)->build($app['db']);
        };
        $app->register(new Provider\DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver' => 'pdo_mysql',
                'dbname' => 'userdb',
                'host' => 'localhost',
                'user' => 'root',
                'password' => null,
            ),
        ));
        $app['user_repository'] = function ($app) {
            return $app['em']->getRepository('UserInfo/Domain/Model/User/User');
        };
        $app->register(new TwigServiceProvider(), array('twig.path' => __DIR__ . '/../../Twig/Views'));
        
        return $app;
    }
}