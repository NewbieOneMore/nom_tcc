<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\TblUsuario;
use app\models\TblPagamento;
use yii\bootstrap\Modal;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::button('Consultar Pedido', ['value'=>Url::to('index.php?r=tbl-pedido-produto/index'), 
                                                'class' => 'btn btn-success', 
                                                'id'=>'modalButtonPedidoProduto']) ?>
    </p>

    <?php 
        Modal::begin([
            'header'=>'<h4>Produtos</h4>',
            'id'=>'modalPedidoProduto',
            'size'=>'modal-lg',
        ]);

        echo "<div id='modalContentPedidoProduto'></div>";

        Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                    'style' => 'text-align: center;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 15%;'
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
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 10%;'
                ],
                'format' => ['currency']
            ],
            
            //'pagPedido:boolean',
            [
                'attribute' => 'pagPedido',
                'contentOptions' => [
                    'style' => 'text-align: center;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 7%;'
                ],
                'format' => ['boolean'],
                'filter' => ['Não', 'Sim'],
            ],

            //'idPagamento',
            [
                'attribute' => 'idPagamento',
                'value' => 'pagamento.formaPagamento',
                'contentOptions' => [
                    'style' => 'text-align: center;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 15%;'
                ],
                'filter' => Html::activeDropDownList($searchModel, 'idPagamento', ArrayHelper::map(TblPagamento::find()->all(), 'idPagamento', 'formaPagamento'),
                [
                    'class'=>'form-control',
                    'prompt'=>'Pagamento'
                ]),
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
