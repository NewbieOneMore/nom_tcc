<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblProdutoUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-produto-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeProduto')->textInput(['maxlength' => '70']) ?>

    <?= $form->field($model, 'precoProduto')->textInput() ?>

    <?= $form->field($model, 'valProduto')->textInput() ?>

    <?= $form->field($model, 'estqProduto')->textInput() ?>

    <?= $form->field($model, 'idCategoria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
