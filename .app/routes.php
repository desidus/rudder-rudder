<?php

use Desidus\Rudder\Route;
use Desidus\Rudder\View;

Route::missing(function($request)
{
    return View::make('master.php');
});