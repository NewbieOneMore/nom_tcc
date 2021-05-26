<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeCategoria')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
