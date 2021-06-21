<?php

/* @var $this yii\web\View */

$this->title = 'Cantina do Henrique';
$idUsuario = Yii::$app->user->identity->id;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Cantina do Henrique</h1>

        <p class="lead">Seja Bem-Vindo, <?= Yii::$app->user->identity->nomeUsuario ?>!</p>
    </div>

    <div class="body-content" style="text-align: center;">

        <div class="row">
            <div class="col-lg-6">  
                <h2>Realizar um pedido</h2>

                <p>Cardápio com todos os nossos produtos</p>

                <p><a class="btn btn-lg btn-success" href="/nom_tcc/yii_framework/web/tbl-produto-usuario">Cardápio</a></p>
            </div>

            <div class="col-lg-6">
                <h2>Minha Conta</h2>

                <p>Meus dados</p>

                <p><a class="btn btn-lg btn-success" href="/nom_tcc/yii_framework/web/tbl-usuario-cliente/view?id=<?= $idUsuario?>">Minha Conta</a></p>
            </div>
            <!-- <div class="col-lg-4"> -->
        </div>
    </div>
</div>