<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Brand.php';
    require_once __DIR__.'/../src/Store.php';

    $server = 'mysql:host=localhost;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

// home
    $app->get('/', function() use ($app) {
        return 'test';
    });

    return $app;
 ?>
