<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblHistoricoEstoque */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-historico-estoque-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPedidoProduto')->textInput() ?>

    <?= $form->field($model, 'idProduto')->textInput() ?>

    <?= $form->field($model, 'histQtd')->textInput() ?>

    <?= $form->field($model, 'natOperacao')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
