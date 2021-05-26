<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TblProduto;
use yii\controllers\TblProdutoController;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TblPedidoProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Pedidos';
?>
<div class="tbl-pedido-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idPedidoProduto',
            //'idPedido',
            [
                'attribute' => 'idPedido',
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 10%;'
                ]
            ],
            //'idProduto',
            [
                'attribute' => 'idProduto',
                'value' => 'produto.nomeProduto',
                'contentOptions' => [
                    'style' => 'text-align: left;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
            ],
            //'qtdProduto',
            [
                'attribute' => 'qtdProduto',
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 10%;'
                ]
            ],
            //'valorProduto',
            [
                'attribute' => 'valorProduto',
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 10%;'
                ],
                'format' => ['currency']
            ],
            //'retProduto:boolean',
            [
                'attribute' => 'retProduto',
                'contentOptions' => [
                    'style' => 'text-align: center;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 5%;'
                ],
                'format' => ['boolean'],
                'filter' => ['Não', 'Sim'],
            ],

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                    'style' => 'text-align: center;
                                width: 8%;'
                ],
                'template' => '{update}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>


</div>
