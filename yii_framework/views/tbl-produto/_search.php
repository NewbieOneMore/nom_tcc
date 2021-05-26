<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TblProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idProduto') ?>

    <?= $form->field($model, 'nomeProduto') ?>

    <?= $form->field($model, 'precoProduto') ?>

    <?= $form->field($model, 'valProduto') ?>

    <?= $form->field($model, 'estqProduto') ?>

    <?php // echo $form->field($model, 'idCategoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
