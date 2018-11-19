<?php

define('RUDDER_START', microtime(true));

// Session start?
//session_start();

// Autoload
require_once __DIR__ . '/.app/vendor/autoload.php';

$appPath = __DIR__ . '/.app';

Desidus\Rudder\App::load($appPath);

Desidus\Rudder\App::handle(new Desidus\Rudder\Request());
