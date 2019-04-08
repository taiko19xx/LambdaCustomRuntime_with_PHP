<?php

use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;

$app = new Micro();

$app->get(
    '/hello',
    function () {
        $response = new Response();
        
        $response->setJsonContent(['hello' => 'world']);
        return $response;
    }
);


$app->handle();