<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPagamento */

$this->title = 'Adicionar Pagamento';
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pagamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
