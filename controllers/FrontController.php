<?php

namespace app\controllers;

use app\services\CarService;

/**
 * Class FrontController
 * @package app\controllers
 */
class FrontController extends \yii\web\Controller
{
    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $cars = CarService::getCarsListDetailInfoArray();

        return $this->render('main', ['cars' => $cars]);
    }

}