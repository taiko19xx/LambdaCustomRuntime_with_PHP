<?php
namespace App\Controller;

class HelloController extends AppController
{
    public function index()
    {
        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode(['hello' => 'world']));

        return $response;
    }
}
