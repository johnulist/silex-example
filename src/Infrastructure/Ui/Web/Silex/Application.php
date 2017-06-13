<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Ui\Web\Silex;

use Silex\Provider;
use Silex\Provider\TwigServiceProvider;
use UserInfo\Application\Service\TransactionalApplicationService;
use UserInfo\Application\Service\User\AddUserService;
use UserInfo\Application\Service\User\ViewUserService;
use UserInfo\Infrastructure\Application\Service\DoctrineSession;
use UserInfo\Infrastructure\Persistence\Doctrine\EntityManagerFactory;

class Application
{
    public static function bootstrap()
    {
        $app = new \Silex\Application();
        $app['debug'] = true;
        $app->register(new Provider\DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver' => 'pdo_mysql',
                'dbname' => 'userdb',
                'host' => 'localhost',
                'user' => 'root',
                'password' => null,
            ),
        ));
        $app['em'] = function ($app) {
            return (new EntityManagerFactory())->build($app['db']);
        };
        $app['tx_session'] = function ($app) {
            return new DoctrineSession($app['em']);
        };
        $app['user_repository'] = function ($app) {
            return $app['em']->getRepository('UserInfo\Domain\Model\User\User');
        };
        $app['view_user_application_service'] = function ($app) {
            return new ViewUserService(
                $app['user_repository']
            );
        };
        $app['add_user_application_service'] = function ($app) {
            return new TransactionalApplicationService(
                new AddUserService($app['user_repository']), $app['tx_session']
            );
        };
        $app->register(new TwigServiceProvider(), array('twig.path' => __DIR__ . '/../../Twig/Views'));
        
        return $app;
    }
}