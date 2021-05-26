<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProduto */

$this->title = 'Atualizar produto: ' . $model->idProduto;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProduto, 'url' => ['view', 'id' => $model->idProduto]];
$this->params['breadcrumbs'][] = 'Atualizar produto';
?>
<div class="tbl-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
