//TblProduto
$(function(){
    //Pegar o click do botao "adicionar" 
    $('#modalButton').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
    });
});

$(function(){
    //Pegar o click do botao "Adicionar categoria" 
    $('#modalButtonCategoria').click(function(){
        $('#modalCategoria').modal('show')
        .find('#modalContentCategoria')
        .load($(this).attr('value'));
    });
});

$(function(){
    //Pegar o click do botao "Excluir categoria" 
    $('#modalButtonExcluirCategoria').click(function(){
        $('#modalExcluirCategoria').modal('show')
        .find('#modalContentExcluirCategoria')
        .load($(this).attr('value'));
    });
});

$(function(){
    //Pegar o click do botao "Consultar pedido" 
    $('#modalButtonPedidoProduto').click(function(){
        $('#modalPedidoProduto').modal('show')
        .find('#modalContentPedidoProduto')
        .load($(this).attr('value'));
    });
});

//Cardápio
var json;
$(document).ready(function () {//Esperar o documento HTML terminar de ser carregado
    $("#btnAdicionarPedido").click(function () {//Encontrar a tag "button" e adicionar evento click
        postPedido();
        return false;
    });
});var json;

function postPedido() {
    let pedido = { 
        'idUsuario': '3',
        'dataPedido': '2021-06-01',
        'precoPedido': 10,
        'pagPedido': 0,
        'idPagamento': '2'
    }//Reunir os dados do formulário em único JSON

    $.post(
        "/nom_tcc/yii_framework/web/api/pedido",
        { "pedido": JSON.stringify(pedido)}, 
        
        //Converter para texto o JSON dos dados e enviar como campo "dados"
        function (response) {
            exibirExemplo(response.status);//Exibir o membro "status" do JSON recebido pela API
        });
}