<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblHistoricoEstoque */

$this->title = 'Update Tbl Historico Estoque: ' . $model->idHistEstoque;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Historico Estoques', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idHistEstoque, 'url' => ['view', 'id' => $model->idHistEstoque]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-historico-estoque-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
