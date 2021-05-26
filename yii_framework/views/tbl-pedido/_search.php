<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPedido') ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?= $form->field($model, 'dataPedido') ?>

    <?= $form->field($model, 'precoPedido') ?>

    <?= $form->field($model, 'pagPedido')->checkbox() ?>

    <?php // echo $form->field($model, 'idPagamento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
