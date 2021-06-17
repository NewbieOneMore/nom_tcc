<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tblUsuarioCliente */

$this->title = 'Atualizar: ' . $model->nomeUsuario;
$idUsuario = Yii::$app->user->identity->id;
?>
<div class="tbl-usuario-cliente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a class="btn btn-primary" href="/nom_tcc/yii_framework/web/tbl-usuario-cliente/view?id=<?= $idUsuario?>">Voltar</a>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
