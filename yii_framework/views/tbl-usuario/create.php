<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblUsuario */

$this->title = 'Cadastrar Usuário';

if (!Yii::$app->user->isGuest) :
$this->params['breadcrumbs'][] = ['label' => 'Usuários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
endif

?>
<div class="tbl-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
