<?php

//Chama a ferramenta do PHPUnit que permite realizar testes.
use PHPUnit\Framework\TestCase;

//Chama uma ferramenta que cria pedidos para testar a API.
use Slim\Psr7\Factory\ServerRequestFactory;

//Cria a classe onde ficará o teste de funcionamento da API.
class CategoriasTest extends TestCase
{
    //Testa se a API está funcionando e retorna a mensagem correta.
    public function testApiFuncionando()
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

        //Verifica se a API respondeu com o número 200.
        //O número 200 significa que deu tudo certo.
        $this->assertEquals(200, $response->getStatusCode());

        //Verifica se a mensagem recebida está correta.
        //Compara a mensagem esperada com a mensagem retornada pela API.
        $this->assertEquals(
            "API de Controle Financeiro funcionando!",
            $dados['mensagem']
        );

    }
}

//Esse arquivo testa se a API funciona e se retorna a mensagem esperada.