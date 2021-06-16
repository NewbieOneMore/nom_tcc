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

    <p><a class="btn btn-success" 
          href="cart"
          style="float: right; margin-top: -40px;">(<?= TblProdutoUsuarioController::getCount();?>) Meu Carrinho</a>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'separator' => "<hr/>",
        //'options' => ['class' => 'list-view well', 'style' => 'background-color: #dddddd'],
        'itemOptions' => ['class' => 'well']
    ]); ?>

</div>