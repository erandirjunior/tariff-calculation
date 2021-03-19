<?php
use Slim\Factory\AppFactory;

require_once dirname(__DIR__).'/vendor/autoload.php';

$container = (new \Config\Dependency\DependencyInjector())->getDependencies();

require_once dirname(__DIR__).'/routes/routes.php';
