<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TblPagamento;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'idUsuario')->textInput() ?>

    <?= $form->field($model, 'dataPedido')->textInput() ?>

    <?= $form->field($model, 'precoPedido')->textInput() ?> -->

    <?= $form->field($model, 'pagPedido')->checkbox() ?>

    <?= $form->field($model, 'idPagamento')->dropDownList(
        ArrayHelper::map(TblPagamento::find()->all(), 'idPagamento', 'formaPagamento'),
        ['prompt'=>'Forma de pagamento']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
