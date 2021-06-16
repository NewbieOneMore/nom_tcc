<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveField;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TblProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Carrinho';
$this->params['breadcrumbs'][] = ['label' => 'Cardápio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$total = \Yii::$app->cart->getCost();
?>
<?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
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
                        
                        <input type="number" class="qty-input form-control" onchange='subTotal()' min="1" max="<?= $row->estqProduto ?>" value="1" style="text-align: center; width:60%;">
                    
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
            <h3>Total:</h3>
            <h2 id="gtotal"><?= number_format($precoTotal, 2, ",", "."); ?></h2>
            <input type="hidden" id="gtotal"/>
       </div>
    </div>

    <?= Html::a('Finalizar pedido', ['checkout'], ['class' => 'btn btn-success']) ?>

    <h3 style="float: right;">
        <input class = "pagamento"  type="radio" name="pagamento" value="1"/> À Vista
        <input class = "pagamento"  type="radio" name="pagamento" value="2"/> Crédito
        <input class = "pagamento"  type="radio" name="pagamento" value="3"/> Débito
        <input class = "pagamento"  type="radio" name="pagamento" value="4" checked = "true"/> Pix
    </h3>

<input type="hidden" id="inputPagamento" value="">
<input type="hidden" id="inputTotal" value="">
</div>
     
<script>
    var pagamento = document.getElementsByClassName('pagamento');
    function getPagamentoValue()
    {
        for(i=0;i<pagamento.length;i++) {
            if(pagamento[i].checked) {
                var pagamentoValue = Number(pagamento[i].value);
                document.getElementById('inputPagamento').value = Number(pagamentoValue);
                alert(pagamentoValue);
            }
        }
    }


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
        gtotal.innerText=(gt).toLocaleString("pt-BR", {style: "currency", currency: "BRL"});
        document.getElementById('inputTotal').value = gtotal;

    }

    subTotal();

</script>
    