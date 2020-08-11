<?php
namespace frontend\controllers;


use yii\web\Controller;

class HelloWorldController extends Controller{
    public $defaultAction = 'say-hello';//设置默认方法

    public function actionSayHello(){
        echo "hello wold";
    }
}