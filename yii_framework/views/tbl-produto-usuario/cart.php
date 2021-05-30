<?php 

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Carrinho';
$this->params['breadcrumbs'][] = ['label' => 'Cardápio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$itemsCount = \Yii::$app->cart->getCount();
$total = \Yii::$app->cart->getCost();
?>
<div class="tbl-produto-usuario-index">
    <?php 
        $precoTotal = 0;
    ?>


    <?php foreach($data as $row) {?>

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-3">
            <?= $row->nomeProduto ?>
        </div>
        <div class="col-md-3">
            <p>R$<?= number_format($row->precoProduto, 2,",",".");?></p>
        </div>
        <div class="col-md-3">
            <?= $row->estqProduto ?>
        </div>
        <div class="col-md-3">
            <a href="">Remover</a>
        </div>
        <?php 
            $precoTotal = $precoTotal + $row->precoProduto;
        ?>
    </div>
    <?php } ?>

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-4">
            <h3>Total: R$ <?= number_format($precoTotal, 2,",","."); ?></h3> 
        </div>
    </div>

        
        <?= Html::a('Finalizar pedido', ['checkout'], ['class'=>'btn btn-success'])?>

</div>