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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('check',  ['uses' => 'CheckController@check']);
    $router->get('check2',  ['uses' => 'CheckController@check2']);

    $router->get('products',  ['uses' => 'ProductController@index']);

    $router->get('students',  ['uses' => 'StudentController@index']);
    $router->get('students/{id}', 'StudentController@show');
    $router->get('students/{id}/tests', 'StudentController@getTests');

    $router->get('tests',  ['uses' => 'TestController@index']);

    $router->get('student-tests',  ['uses' => 'StudentTestController@index']);
    $router->get('student-tests/{id}',  ['uses' => 'StudentTestController@show']);

//    $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
//
//    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
//
//    $router->post('authors', ['uses' => 'AuthorController@create']);
//
//    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
//
//    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});
