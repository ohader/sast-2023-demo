<?php
declare(strict_types=1);

use OliverHader\Sast2023Demo\Controller\SimpleController;

(static function() {
    $rootPath = dirname(__DIR__);
    require_once $rootPath . '/vendor/autoload.php';
    $pdo = new PDO('mysql:dbname=db;host=db', 'db', 'db');
    $controller = new SimpleController($pdo);
    $controller->showAction();
})();
