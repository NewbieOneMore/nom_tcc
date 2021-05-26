<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedidoProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pedido-produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPedidoProduto') ?>

    <?= $form->field($model, 'idPedido') ?>

    <?= $form->field($model, 'idProduto') ?>

    <?= $form->field($model, 'qtdProduto') ?>

    <?= $form->field($model, 'valorProduto') ?>

    <?php // echo $form->field($model, 'retProduto')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
