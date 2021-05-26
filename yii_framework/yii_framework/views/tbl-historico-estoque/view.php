<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblHistoricoEstoque */

$this->title = $model->idHistEstoque;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Historico Estoques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-historico-estoque-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idHistEstoque], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idHistEstoque], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idHistEstoque',
            'idPedidoProduto',
            'idProduto',
            'histQtd',
            'natOperacao:boolean',
        ],
    ]) ?>

</div>
