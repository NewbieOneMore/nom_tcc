<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProdutoUsuario */

$this->title = 'Create Tbl Produto Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Produto Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-produto-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
