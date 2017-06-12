<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */
require_once __DIR__ . '/vendor/autoload.php';
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    (new UserInfo\Infrastructure\Ui\Web\Silex\Application())->bootstrap()['em']
);

