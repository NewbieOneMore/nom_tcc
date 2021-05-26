<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\TblUsuario;

/* @var $this yii\web\View */
/* @var $model app\models\TblPedido */

$this->title = $model->idPedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPedido], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPedido], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esse item??',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPedido',
            'idUsuario',
            /* [
                'attribute' => 'idUsuario',
                'value' => 'usuario.nomeUsuario',
            ], */
            //'dataPedido',
            [
                'attribute' => 'dataPedido',
                'format' => ['date', 'dd/MM/YYYY'],
            ],
            //'precoPedido',
            [
                'attribute' => 'precoPedido',
                'format' => ['currency']
            ],
            'pagPedido:boolean',
        ],
    ]) ?>

</div>
