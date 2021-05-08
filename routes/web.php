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
    $router->get('products',  ['uses' => 'ProductController@index']);

    $router->get('students',  ['uses' => 'StudentController@index']);
    $router->get('students/{uid}', 'StudentController@show');
    $router->get('students/{uid}/tests', 'StudentController@getTests');
    $router->get('students/{uid}/tests/{tid}', 'StudentController@getTest');

    $router->get('tests',  ['uses' => 'TestController@index']);
    $router->get('tests/{id}',  ['uses' => 'TestController@show']);
    $router->post('tests', ['uses' => 'TestController@create']);

    $router->get('submissions',  ['uses' => 'SubmissionController@index']);
    $router->get('submissions/{sid}',  ['uses' => 'SubmissionController@show']);
    $router->get('submissions/{sid}/content',  ['uses' => 'SubmissionController@showContent']);

    $router->post('submissions', ['uses' => 'SubmissionController@create']);
    $router->post('submissions/{sid}/submit', ['uses' => 'SubmissionController@submit']);
    $router->delete('submissions/{sid}', ['uses' => 'SubmissionController@delete']);

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
