<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tblUsuarioCliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-usuario-cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senhaUsuario')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
