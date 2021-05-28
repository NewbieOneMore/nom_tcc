<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cardápio';
?>
<div class="tbl-produto-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idProduto',
            //'nomeProduto',
            ['class' => 'yii\grid\CheckboxColumn',
                'contentOptions' => [
                    'style' => 'text-align: center;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;
                                width: 5%;'
                ],
                'header' => false,
            ],
            [
                'attribute' => 'nomeProduto',
                'contentOptions' => [
                    'style' => 'text-align: left;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
            ],
            //'precoProduto',
            [
                'attribute' => 'precoProduto',
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'format' => ['currency']
            ],
            //'valProduto',
            //'estqProduto',
            [
                'attribute' => 'estqProduto',
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
            ],
            //'idCategoria',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
