<?php 
use yii\helpers\Html;
?>
<div class="produtos">
    <h2><?= Html::encode($model->nomeProduto) ?></h2>
    <strong> 
        Preço: R$<?= number_format($model->precoProduto, 2,",",".");?>
    </strong>

    <p> 
        Estoque: <?= $model->estqProduto ?>
    </p>
    
    <?= Html::a('+ Adicionar ao Carrinho', ['add-to-cart', 'idProduto' => $model->idProduto], ['class'=>'btn btn-primary'])?>

</div>