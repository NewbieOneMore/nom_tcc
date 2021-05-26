<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblHistoricoEstoque */

$this->title = 'Create Tbl Historico Estoque';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Historico Estoques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-historico-estoque-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
