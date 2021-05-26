<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedido */

$this->title = 'Pedido: ' . $model->idPedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualzar', ['update', 'id' => $model->idPedido], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPedido',
            //'idUsuario',
            [
                'attribute' => 'idUsuario',
                'value' => $model->getUsuario()->One()->nomeUsuario,
            ],
            //'dataPedido',
            [
                'attribute' => 'dataPedido',
                'format' => ['date', 'dd/MM/YYYY'],
            ],
            //'precoPedido',
            [
                'attribute' => 'precoPedido',
                'format' => ['currency']
            ],
            'pagPedido:boolean',
            //'idPagamento',
            [
                'attribute' => 'idPagamento',
                'value' => $model->getPagamento()->One()->formaPagamento,
            ],
        ],
    ]) ?>

</div>
