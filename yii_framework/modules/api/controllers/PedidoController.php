<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class PedidoController extends ActiveController
{
    public $modelClass = 'app\models\TblPedido';

    public function actions()
    {        $actions = parent::actions();
        unset($actions['delete'], $actions['update']);
        return $actions;
    }
}
