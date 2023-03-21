<?php
declare(strict_types=1);

use Doctrine\DBAL\DriverManager;
use OliverHader\Sast2023Demo\Controller\RealisticController;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

(static function() {
    $rootPath = dirname(__DIR__);
    require_once $rootPath . '/vendor/autoload.php';
    $loader = new FilesystemLoader('templates', $rootPath);
    $environment = new Environment($loader, [
        'cache' => $rootPath . '/var/cache/twig',
        'auto_reload' => true,
        'debug' => true,
        'optimizations' => 0,
        'strict_variables' => false,
    ]);
    $connection = DriverManager::getConnection([
        'dbname' => 'db',
        'user' => 'db',
        'password' => 'db',
        'host' => 'db',
        'driver' => 'pdo_mysql',
    ]);
    $controller = new RealisticController($environment, $connection);
    $request = Request::createFromGlobals();
    $controller->showAction($request)->send();
})();
