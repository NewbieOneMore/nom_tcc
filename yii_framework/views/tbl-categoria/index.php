<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';

?>
<div class="tbl-categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Aviso: Não é possível excluir uma categoria que tenha itens cadastrados. Por favor, troque a categoria dos produtos cadastrados na categoria que deseja excluir.</p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idCategoria',
            'nomeCategoria',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
        ],
    ]); ?>
</div>