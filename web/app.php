<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

$env = 'prod';
$debug = false;

if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || (in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1', '192.168.88.11', '85.140.35.16'], true) || PHP_SAPI === 'cli-server')
) {
    $env = 'dev';
    Debug::enable();
    $debug = true;
}

$kernel = new AppKernel($env, $debug);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
