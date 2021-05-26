<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedido */

$this->title = 'Create Tbl Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
