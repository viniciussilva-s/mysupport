<?php
	require_once('vendor/autoload.php');
	
	
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
	
		$app = new \Slim\Slim();
	$app->get('/hello/:name', function ($name) {
		echo "Hello, " . $name;
	});
	$app->run();




?>