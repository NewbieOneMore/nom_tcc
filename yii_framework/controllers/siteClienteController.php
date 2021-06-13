<?php

namespace app\controllers;

class siteClienteController extends \yii\web\Controller
{
    public function actionIndexCliente()
    {
        return $this->render('index-cliente');
    }

}
