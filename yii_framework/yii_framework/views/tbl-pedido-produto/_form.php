<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedidoProduto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pedido-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPedido')->textInput() ?>

    <?= $form->field($model, 'idProduto')->textInput() ?>

    <?= $form->field($model, 'qtdProduto')->textInput() ?>

    <?= $form->field($model, 'valorProduto')->textInput() ?>

    <?= $form->field($model, 'retProduto')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
