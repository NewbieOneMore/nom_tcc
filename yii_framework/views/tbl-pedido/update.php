<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedido */

$this->title = 'Atualizar Pedido: ' . $model->idPedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Pedido: ' . $model->idPedido, 'url' => ['view', 'id' => $model->idPedido]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="tbl-pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
