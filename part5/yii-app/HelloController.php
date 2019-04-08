<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class HelloController extends Controller
{
    public function actionIndex()
    {
        yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['hello' => 'world'];
    }
}
