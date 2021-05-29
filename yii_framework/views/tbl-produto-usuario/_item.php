<?php 
use yii\helpers\Html;
?>
<div class="produtos">
    <h2><?= Html::encode($model->nomeProduto) ?></h2>
    <h3> 
        Preço: R$<?= $model->precoProduto ?>
    </h3>

    <p> 
        Estoque: <?= $model->estqProduto ?>
    </p>

    <?= Html::button('Adicionar ao carrinho', ['class' => 'btn btn-success', 
                                        'id'=>'btnAdicionarCarrinho']) ?>
</div>