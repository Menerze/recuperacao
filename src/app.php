<?php
//Chama uma ferramenta do Slim que ajuda a criar a API.
use Slim\Factory\AppFactory;

//Carrega as ferramentas e bibliotecas necessárias para o projeto funcionar.
require __DIR__ . '/../vendor/autoload.php';

//Cria a aplicação e guarda ela na variável $app.
$app = AppFactory::create();

// Retorna uma mensagem inicial em JSON.
$app->get('/', function ($request, $response, $args) {
//Cria um endereço para acessar a API.
//O GET significa que alguém está pedindo uma informação.
//A barra / representa a página inicial.

   $dados = [
       "mensagem" => "API de Controle Financeiro funcionando!"
   ];
   //Cria uma informação que será enviada para quem acessar a API.
   

   $response->getBody()->write(
       json_encode($dados, JSON_UNESCAPED_UNICODE)
   );
   //Transforma a informação em JSON, que é um formato usado para enviar dados entre sistemas.


   return $response->withHeader(
       'Content-Type',
       'application/json'
   );
   //Informa que a resposta enviada está no formato JSON.


});
return $app;
//Devolve a aplicação pronta para ser utilizada.
//esse arquivo cria a API e faz ela responder com uma mensagem quando alguém acessa o endereço principal.