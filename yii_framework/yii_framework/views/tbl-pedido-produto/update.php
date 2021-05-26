<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedidoProduto */

$this->title = 'Update Tbl Pedido Produto: ' . $model->idPedidoProduto;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pedido Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPedidoProduto, 'url' => ['view', 'id' => $model->idPedidoProduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pedido-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
