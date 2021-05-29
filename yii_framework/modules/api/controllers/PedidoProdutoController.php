<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class PedidoProdutoController extends ActiveController
{
    public $modelClass = 'app\models\TblPedidoProduto';

    public function actions()
    {        $actions = parent::actions();
        unset($actions['delete'], $actions['update']);
        return $actions;
    }
}
