<?php
error_reporting(-1);
ini_set('display_errors', 1);

session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

$setting = include __DIR__ . '/../app/setting.php';

$app = new \Slim\App($setting);

include __DIR__ . '/../app/container.php';
include __DIR__ . '/../app/route.php';

$app->run();
