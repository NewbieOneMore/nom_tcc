<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedidoProduto */

$this->title = 'Retirar Produto: ' . $model->getProduto()->One()->nomeProduto;
?>
<div class="tbl-pedido-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
