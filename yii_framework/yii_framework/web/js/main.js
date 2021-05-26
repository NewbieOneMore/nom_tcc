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

