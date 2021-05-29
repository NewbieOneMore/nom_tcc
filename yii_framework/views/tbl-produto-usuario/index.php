<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cardápio';
?>
<div class="tbl-produto-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'separator' => "<hr/>",
        //'options' => ['class' => 'list-view well'],
        'itemOptions' => ['class' => 'well']
    ]); ?>


<?= Html::button('Finalizar pedido', ['class' => 'btn btn-primary', 
                                        'id'=>'btnAdicionarPedido', 
                                        'style'=>'float: right;']) ?>

</div>
