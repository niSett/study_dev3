<?php
    //using general namespace
    namespace app\core;

    //request autoload file
    require_once __DIR__ . '/../vendor/autoload.php';

    //use this namespace

    use app\controllers\AuthController;
    use app\controllers\SiteController;
    use app\core\Application;

    //new object app
    $app = new Application(dirname(__DIR__));

    //routers
    $app->router->get('/', [SiteController::class, 'home']);
    $app->router->get('/contact', [SiteController::class, 'contact']);
    $app->router->post('/contact', [SiteController::class, 'handleContact']);

    $app->router->get('/login', [AuthController::class, 'login']);
    $app->router->post('/login', [AuthController::class, 'login']);
    $app->router->get('/register', [AuthController::class, 'register']);
    $app->router->post('/register', [AuthController::class, 'register']);

    //run our app
    $app->run();
?>