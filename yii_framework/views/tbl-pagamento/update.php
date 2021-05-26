<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPagamento */

$this->title = 'Atualizar Pagamento: ' . $model->idPagamento;
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPagamento, 'url' => ['view', 'id' => $model->idPagamento]];
$this->params['breadcrumbs'][] = 'Atualizar Pagamento';
?>
<div class="tbl-pagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
