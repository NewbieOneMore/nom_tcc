<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblUsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?= $form->field($model, 'nomeUsuario') ?>

    <?= $form->field($model, 'emailUsuario') ?>

    <?= $form->field($model, 'senhaUsuario') ?>

    <?= $form->field($model, 'authkeyUsuario') ?>

    <?php // echo $form->field($model, 'accesstokenUsuario') ?>

    <?php // echo $form->field($model, 'admUsuario')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
