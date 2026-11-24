<?php

//Carrega o arquivo principal da API.
//O __DIR__ representa a pasta onde este arquivo está localizado.
//O /src/app.php indica onde está o arquivo que configura a API.
$app = require __DIR__ . '/src/app.php';

//Inicia a API para que ela possa receber pedidos e enviar respostas.
//O run() faz a aplicação começar a funcionar.
$app->run();

//Esse arquivo inicia a API e permite que ela seja acessada.