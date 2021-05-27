<?php

/* @var $this yii\web\View */

$this->title = 'Cantina do Henrique';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Cantina do Henrique</h1>

        <p class="lead">Newbie One More</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">  
                <h2>Pedidos</h2>

                <p>Tabela com os pedidos pendentes e pedidos já feitos.</p>

                <p><a class="btn btn-lg btn-success" href="/nom_tcc/yii_framework/web/index.php/tbl-pedido">Pedidos</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Produtos</h2>

                <p>Tabela com todos os produtos já registrados</p>

                <p><a class="btn btn-lg btn-success" href="/nom_tcc/yii_framework/web/index.php/tbl-produto">Produtos</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Usuários</h2>

                <p>Todos os usuários já cadastrados no sistema.</p>

                <p><a class="btn btn-lg btn-success" href="/nom_tcc/yii_framework/web/index.php/tbl-usuario">Usuários</a></p>
            </div>
            <!-- <div class="col-lg-4"> -->
        </div>
    </div>
</div>