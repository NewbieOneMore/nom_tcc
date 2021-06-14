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
    <div class="row" style="margin-top: 30px; border-radius: 5px;">
        <div class="col-md-3" style="background-color: #ebebeb;">
            <h2><strong>Produto</strong></h2>
        </div>

        <div class="col-md-3" style="background-color: #ebebeb;">
            <h2><strong>Preço</strong></h2>
        </div>

        <div class="col-md-3" style="background-color: #ebebeb;">
            <h2><strong>Quantidade</strong></h2>
        </div>

        <div class="col-md-3" style="background-color: #ebebeb;">
            <h2><strong>Ações</strong></h2>
        </div>
    </div>

    <?php foreach ($data as $row) { ?>

        <div class="row produto" style="margin-top: 30px;">
            <div class="col-md-3">
                <h3><?= $row->nomeProduto ?></h3>
            </div>
            <div class="col-md-3">
                <h3 class="preco">R$ <?= number_format($row->precoProduto, 2, ",", "."); ?></h3>
                <input type="hidden" class="ipreco" value="<?= $row->precoProduto; ?>" />
            </div>
            <div class="col-md-3">
                <div class="input-group quantity" style="display: flex; margin-top: 15px;">                    
                    
                    <!-- <div class="input-group-prepend decrement-btn" style="cursor: pointer;">
                        <span class="btn btn-info"><strong>-</strong></span>
                    </div> -->
                        
                        <input type="number" class="qty-input form-control" onchange='subTotal()' min="1" max="10" value="1" style="text-align: center; width:60%;">
                    
                    <!-- <div class="input-group-append increment-btn" style="cursor: pointer;">
                        <span class="btn btn-info"><strong>+</strong></span>
                    </div> -->
                    
                </div>
                <input type="hidden" class="itotal"/>  
            </div>
            <div class="col-md-3">
                <?= Html::a('Remover', ['remove?id=' . $row->getId()], ['class' => 'btn btn-danger', 'style' => 'margin-top: 15px;']) ?>
            </div>
        </div>
    <?php } ?>

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-4">
            <h3>Total: R$</h3>
            <h2 id="gtotal"><?= number_format($precoTotal, 2, ",", "."); ?></h2>
            <input type="hidden" id="gtotal"/>
       </div>
    </div>

    <?= Html::a('Finalizar pedido', ['checkout'], ['class' => 'btn btn-success']) ?>
</div>

<script>

    var gt=0;
    var ipreco=document.getElementsByClassName('ipreco');
    var iquantidade=document.getElementsByClassName('qty-input form-control');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal=document.getElementById('gtotal');

    function subTotal()
    {
        gt=0;
        for(i=0; i<ipreco.length;i++)
        {
            itotal[i].value=(ipreco[i].value)*(iquantidade[i].value);

            gt=gt+(ipreco[i].value)*(iquantidade[i].value);
        }
        gtotal.innerText=gt;
    }

    subTotal();

</script>