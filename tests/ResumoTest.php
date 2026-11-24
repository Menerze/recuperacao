<?php

//Chama a ferramenta do PHPUnit que permite realizar testes.
use PHPUnit\Framework\TestCase;

//Chama uma ferramenta que cria pedidos para testar a API.
use Slim\Psr7\Factory\ServerRequestFactory;

//Cria a classe onde ficará o teste da mensagem da API.
class ResumoTest extends TestCase
{
    //Testa se a resposta da API possui uma mensagem.
    public function testMensagemDaApi()
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

        //Pega a resposta e transforma o JSON em um array.
        //Isso permite verificar as informações recebidas.
        $dados = json_decode((string) $response->getBody(), true);

        //Verifica se existe uma informação chamada mensagem no array.
        //Se a informação existir, o teste passa.
        $this->assertArrayHasKey('mensagem', $dados);

    }
}

//Esse arquivo testa se a resposta da API possui a informação mensagem.