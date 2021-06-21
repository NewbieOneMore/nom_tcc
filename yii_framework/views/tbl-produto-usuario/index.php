<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;
use app\controllers\TblProdutoUsuarioController;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cardápio';
?>
<div class="tbl-produto-usuario-index"> 

    <h1><?= Html::encode($this->title) ?></h1> 

    <?php $itens = TblProdutoUsuarioController::getCount();
        if($itens > 0) : ?>
        <p><a class="btn btn-success"
        href="tbl-produto-usuario/cart"
        style="float: right; margin-top: -40px;">(<?=$itens?>) Meu Carrinho</a>
        </p>
    <?php endif ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'separator' => "<hr/>",
        //'options' => ['class' => 'list-view well', 'style' => 'background-color: #dddddd'],
        'itemOptions' => ['class' => 'well']
    ]); ?>

</div>