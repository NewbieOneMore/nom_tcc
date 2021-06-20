//TblProduto
$(function () {
    //Pegar o click do botao "adicionar" 
    $('#modalButton').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});

$(function () {
    //Pegar o click do botao "Adicionar categoria" 
    $('#modalButtonCategoria').click(function () {
        $('#modalCategoria').modal('show')
            .find('#modalContentCategoria')
            .load($(this).attr('value'));
    });
});

//MODAL EXCLUIR CATEGORIA
$(function () {
    //Pegar o click do botao "Excluir categoria" 
    $('#modalButtonExcluirCategoria').click(function () {
        $('#modalExcluirCategoria').modal('show')
            .find('#modalContentExcluirCategoria')
            .load($(this).attr('value'));
    });
});

$(function (){
    $('#modalButtonExcluirCategoria').on('hide.bs.modal', function () {
        window.location ='/nom_tcc/yii_framework/web/tbl-produto';
    });    
});

//MODAL CONSULTAR PEDIDO
$(function () {
    //Pegar o click do botao "Consultar pedido" 
    $('#modalButtonPedidoProduto').click(function () {
        $('#modalPedidoProduto').modal('show')
            .find('#modalContentPedidoProduto')
            .load($(this).attr('value'));
    });
});

$(function (){
    $('#modalPedidoProduto').on('hide.bs.modal', function () {
        window.location ='/nom_tcc/yii_framework/web/tbl-pedido';
    });    
});

//Carrinho
$(document).ready(function () {

    $('.increment-btn').click(function (e) {
        e.preventDefault();
        /*var precoProduto = '<?php echo $precoProduto; ?>'
        var precoTotal = '<?php echo $precoTotal; ?>' */
        var incre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }

    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

});
function getQuantity() 
{
    var stringValue = $('.quantity').find('.qty-input').val();
    var numberValue = Number(stringValue);

}
var value = getQuantity();

var iPrecoProduto = $('.produto').find('.preco2').val();
var precoProduto = Number(iPrecoProduto);
var iPrecoTotal = $('.total2').html();
var precoTotal = Number(iPrecoTotal);

var produtoMultiplicado = precoProduto * value;


