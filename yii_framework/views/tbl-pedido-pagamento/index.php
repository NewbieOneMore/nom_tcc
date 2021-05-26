<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Pedido Pagamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pedido-pagamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Pedido Pagamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPedidoPagamento',
            'idPedido',
            'idPagamento',
            'valorPago',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
