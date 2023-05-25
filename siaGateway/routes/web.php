<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


//User1
$router->get('/users1', 'User1Controller@index');
$router->post('/addusers1', 'User1Controller@add'); // create new user record
$router->get('/getusers1/{id}', 'User1Controller@show');
$router->put('/upusers1/{id}', 'User1Controller@update'); // update user record
$router->delete('/delusers1/{id}', 'User1Controller@delete'); //delete record




//User2
$router->get('/users2', 'User2Controller@index');
$router->post('/addusers2', 'User2Controller@add'); // create new user record
$router->get('/getusers2/{id}', 'User2Controller@show');
$router->put('/upusers2/{id}', 'User2Controller@update'); // update user record
$router->delete('/delusers2/{id}', 'User2Controller@delete'); //delete record
