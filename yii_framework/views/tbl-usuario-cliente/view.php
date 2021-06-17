<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tblUsuarioCliente */

$this->title = $model->nomeUsuario;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-usuario-cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Voltar', ['/site/home'], ['class' => 'btn btn-primary']) ?>
    
        <?= Html::a('Atualizar', ['update', 'id' => $model->idUsuario], ['class' => 'btn btn-success',
                                                                         'style'=>'float: right;']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idUsuario',
            'nomeUsuario',
            'emailUsuario:email',
            'senhaUsuario',
            //'authkeyUsuario',
            //'accesstokenUsuario',
            //'admUsuario:boolean',
        ],
    ]) ?>

</div>
