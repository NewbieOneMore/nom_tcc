<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProdutoUsuario */

$this->title = 'Update Tbl Produto Usuario: ' . $model->idProduto;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Produto Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProduto, 'url' => ['view', 'id' => $model->idProduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-produto-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
