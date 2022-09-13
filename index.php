<?php
require 'core/bootstrap.php';

$routes = [
	'/hallo/welt' => 'WelcomeController@index',
	'/' => 'VideoController@index',
	//'/video/index' => 'VideoController@index',
	'/videolist' => 'VideoController@list',
	'/videoupdate' => 'VideoController@update',
	'/videoedit' => 'VideoController@edit',
	'/videodelete' => 'VideoController@delete',
	//'/video/create' => 'VideoController@create',
];

$db = [
	'name'     => 'videolibrary',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');
