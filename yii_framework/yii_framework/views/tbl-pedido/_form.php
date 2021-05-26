<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUsuario')->textInput() ?>

    <?= $form->field($model, 'dataPedido')->textInput() ?>

    <?= $form->field($model, 'precoPedido')->textInput() ?>

    <?= $form->field($model, 'pagPedido')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
