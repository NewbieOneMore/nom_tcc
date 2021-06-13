<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tblUsuarioCliente */

$this->title = 'Update Tbl Usuario Cliente: ' . $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Usuario Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUsuario, 'url' => ['view', 'id' => $model->idUsuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-usuario-cliente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
