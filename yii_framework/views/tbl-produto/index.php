<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\TblCategoria;
use yii\grid\GridView;
use yii\web\Controller;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\controllers\TblCategoriaController;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Adicionar Produto', ['value'=>Url::to('tbl-produto/create'), 
                                                'class' => 'btn btn-success', 
                                                'id'=>'modalButton']) ?>

        <?= Html::button('Excluir Categoria', ['value'=>Url::to('tbl-categoria'), 
                                                'class' => 'btn btn-danger', 
                                                'id'=>'modalButtonExcluirCategoria', 
                                                'style'=>'float: right;
                                                          margin-left: 5px;']) ?>

        <?= Html::button('Adicionar Categoria', ['value'=>Url::to('tbl-categoria/create'), 
                                                'class' => 'btn btn-primary', 
                                                'id'=>'modalButtonCategoria', 
                                                'style'=>'float: right;']) ?>

    </p>

    <?php 
        Modal::begin([
            'header'=>'<h4>Produtos</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>

    <?php 
        Modal::begin([
            'header'=>'<h4>Categoria</h4>',
            'id'=>'modalCategoria',
            'size'=>'modal-lg',
        ]);

        echo "<div id='modalContentCategoria'></div>";

        Modal::end();
    ?>

    <?php 
        Modal::begin([
            'header'=>'<h4>Categoria</h4>',
            'id'=>'modalExcluirCategoria',
            'size'=>'modal-lg',
        ]);

        echo "<div id='modalContentExcluirCategoria'></div>";

        Modal::end();
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idProduto',
            /* [
                'attribute' => 'idProduto',
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ]
            ], */

            //'nomeProduto',
            [
                'attribute' => 'nomeProduto',
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ]
            ],

            //'precoProduto',
            [
                'attribute' => 'precoProduto',
                'contentOptions' => [
                    'style' => 'text-align: right;
                                width: 10%;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'format' => ['currency']
            ],

            //'valProduto',
            [
                'attribute' => 'valProduto',
                'contentOptions' => [
                    'style' => 'text-align: center;
                                width: 15%;',
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'format' => ['date', 'dd/MM/YYYY'],
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'valProduto',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],

            //'estqProduto',
            [
                'attribute' => 'estqProduto',
                'contentOptions' => [
                    'style' => 'text-align: right;
                                width: 10%;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ]
            ],

            //'idCategoria',
            [
                'attribute' => 'idCategoria',
                'value' => 'categoria.nomeCategoria',
                'contentOptions' => [
                    'style' => 'text-align: left;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'filter' => Html::activeDropDownList($searchModel, 'idCategoria', ArrayHelper::map(TblCategoria::find()->all(), 'idCategoria', 'nomeCategoria'),
                [
                    'class'=>'form-control',
                    'prompt'=>'Categoria'
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
