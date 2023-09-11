<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => ''], function (Router $router) {
  $router->get('search', [
    'uses' => 'PublicController@index',
    'as'   => 'search.index'
  ]);
  $router->post('search', [
    'uses' => 'PublicController@index',
    'as'   => 'search.index'
  ]);
});