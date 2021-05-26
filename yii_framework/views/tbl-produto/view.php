<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\Controller;


/* @var $this yii\web\View */
/* @var $model app\models\TblProduto */

$this->title = $model->nomeProduto;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

//Mostrar o nome da categoria ao invés do id
?>
<div class="tbl-produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idProduto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->idProduto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idProduto',
            'nomeProduto',
            //'precoProduto',
            [
                'attribute' => 'precoProduto',
                'format' => ['currency']
            ],
            //'valProduto',
            [
                'attribute' => 'valProduto',
                'format' => ['date', 'dd/MM/YYYY'],
            ],
            'estqProduto',
            //'idCategoria',
            [
                'attribute' => 'idCategoria',
                'value' => $model->getCategoria()->One()->nomeCategoria,
            ],
        ],
    ]) ?>

</div>