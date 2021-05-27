<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cadastrar Usuário', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idUsuario',
            /* [
                'attribute' => 'idUsuario',
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ]
            ], */
            //'nomeUsuario',
            [
                'attribute' => 'nomeUsuario',
                'contentOptions' => [
                    'style' => 'text-align: left;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ]
            ],
            //'emailUsuario:email',
            [
                'attribute' => 'emailUsuario',
                'contentOptions' => [
                    'style' => 'text-align: left;'
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;'
                ],
                'format' => ['email'],
            ],
            //'senhaUsuario',
            //'authkeyUsuario',
            //'accesstokenUsuario',
            //'admUsuario:boolean',
            [
                'attribute' => 'admUsuario',
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
    <?php Pjax::end(); ?>


</div>
