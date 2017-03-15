<?php
$container = new \Slim\Container;

$container = $app->getContainer();
$container['db'] = function ($x)
{
    $setting = $x->get('settings')['db'];
    $config    = new \Doctrine\DBAL\Configuration();
    $connectionParams = array(
        'dbname'   => $setting['name'],
        'user'     => $setting['user'],
        'password' => $setting['pass'],
        'host'     => $setting['host'],
        'driver'   => 'pdo_mysql',
    );

    $connection = \Doctrine\DBAL\DriverManager::getConnection(
        $connectionParams,
        $config
    );
    return $connection->createQueryBuilder();

};

// Register component on container
$container['view'] = function ($x)
{
    $view = new \Slim\Views\Twig(
        $x->get('settings')['view_path'], [
        'cache' => false
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension($x->router,$x->request->getUri()));
        $view->addExtension(new Twig_Extension_Debug($basePath));

        $view->getEnvironment()->addGlobal('old', @$_SESSION['old']);
        unset($_SESSION['old']);

        $view->getEnvironment()->addGlobal('errors', @$_SESSION['errors']);
        unset($_SESSION['errors']);

  	return $view;
};

$container['validation'] = function ($x) {
  $settings = $x->get('settings');
  $param = $x['request']->getParams();
  $lang = $settings['lang'];

  return new \Valitron\Validator($param, [], $lang['default']);
};
