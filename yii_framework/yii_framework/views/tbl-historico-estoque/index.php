<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histórico do Estoque';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-historico-estoque-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idHistEstoque',
            'idPedidoProduto',
            'idProduto',
            'histQtd',
            'natOperacao:boolean',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
