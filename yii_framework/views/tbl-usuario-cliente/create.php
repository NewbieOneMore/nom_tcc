<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tblUsuarioCliente */

$this->title = 'Cadastrar-se';
/*
$this->params['breadcrumbs'][] = ['label' => 'Tbl Usuario Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title; */
?>
<div class="tbl-usuario-cliente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
