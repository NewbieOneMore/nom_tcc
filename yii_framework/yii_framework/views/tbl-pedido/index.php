<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\TblUsuario;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idPedido',
            [
                'attribute' => 'idPedido',
                'contentOptions' => [
                    'style' => 'text-align: right;
                                width: 10%;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ]
            ],

            //'idUsuario',
            [
                'attribute' => 'idUsuario',
                'value' => 'usuario.nomeUsuario',
                'contentOptions' => [
                    'style' => 'text-align: left;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ]
            ],

            //'dataPedido',
            [
                'attribute' => 'dataPedido',
                'contentOptions' => [
                    'style' => 'text-align: center;
                                width: 15%;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'format' => ['date', 'dd/MM/YYYY'],
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'dataPedido',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],

            //'precoPedido',
            [
                'attribute' => 'precoPedido',
                'contentOptions' => [
                    'style' => 'text-align: right;
                                width: 10%;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'format' => ['currency']
            ],
            
            //'pagPedido:boolean',
            [
                'attribute' => 'pagPedido',
                'contentOptions' => [
                    'style' => 'text-align: center;
                                width: 7%;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'format' => ['boolean'],
                'filter' => ['Não', 'Sim'],
            ],

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                    'style' => 'text-align: center;
                                width: 7%;'
                ],
            ],
        ],
    ]); ?>


</div>
