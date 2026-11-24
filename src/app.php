<?php
use Slim\Factory\AppFactory;
require __DIR__ . '/../vendor/autoload.php';
$app = AppFactory::create();

// Retorna uma mensagem inicial em JSON.
$app->get('/', function ($request, $response, $args) {
   $dados = [
       "mensagem" => "API de Controle Financeiro funcionando!"
   ];
   $response->getBody()->write(
       json_encode($dados, JSON_UNESCAPED_UNICODE)
   );
   return $response->withHeader(
       'Content-Type',
       'application/json'
   );
});
return $app;