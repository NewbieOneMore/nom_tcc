<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TblCategoria;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TblProduto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeProduto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precoProduto')->textInput() ?>

    <?= $form->field($model, 'valProduto')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'estqProduto')->textInput() ?>

    <?= $form->field($model, 'idCategoria')->dropDownList(
        ArrayHelper::map(TblCategoria::find()->all(), 'idCategoria', 'nomeCategoria'),
        ['prompt'=>'Selecione a categoria']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
