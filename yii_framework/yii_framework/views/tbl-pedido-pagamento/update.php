<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedidoPagamento */

$this->title = 'Update Tbl Pedido Pagamento: ' . $model->idPedidoPagamento;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pedido Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPedidoPagamento, 'url' => ['view', 'id' => $model->idPedidoPagamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pedido-pagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
