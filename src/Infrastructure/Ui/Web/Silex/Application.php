<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Ui\Web\Silex;

use Silex\Provider\TwigServiceProvider;

class Application
{
    public static function bootstrap()
    {
        $app = new \Silex\Application();
        $app['debug'] = true;
        $app->register(new TwigServiceProvider(), array('twig.path' => __DIR__ . '/../../Twig/Views'));
        
        return $app;
    }
}