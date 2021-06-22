<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblUsuario */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if (Yii::$app->user->isGuest) :?>
<div class="tbl-usuario-form">

    <p>
        <?= Html::a('Voltar', ['/site/login'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senhaUsuario')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php else : ?>

<div class="tbl-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senhaUsuario')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admUsuario')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php endif ?>