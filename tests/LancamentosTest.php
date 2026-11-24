<?php

//Chama a ferramenta do PHPUnit que permite realizar testes.
use PHPUnit\Framework\TestCase;

//Chama uma ferramenta que cria pedidos para testar a API.
use Slim\Psr7\Factory\ServerRequestFactory;

//Cria a classe onde ficará o teste da resposta em JSON.
class LancamentosTest extends TestCase
{
    //Testa se a API responde utilizando o formato JSON.
    public function testRespostaEmJson()
    {
        //Carrega o código principal da API.
        $app = require __DIR__ . '/../src/app.php';

        //Cria um pedido para acessar a página inicial da API.
        //O GET significa que estamos pedindo uma informação.
        //A barra / representa a página inicial.
        $request = (new ServerRequestFactory())
            ->createServerRequest('GET', '/');

        //Envia o pedido para a API e recebe a resposta.
        $response = $app->handle($request);

        //Verifica se a API respondeu com o número 200.
        //O número 200 significa que deu tudo certo.
        $this->assertEquals(200, $response->getStatusCode());

        //Verifica se a resposta está no formato JSON.
        //application/json significa que os dados estão em JSON.
        $this->assertEquals(
            'application/json',
            $response->getHeaderLine('Content-Type')
        );

    }
}

//Esse arquivo testa se a API responde corretamente e envia os dados em JSON.