<?php
use PHPUnit\Framework\TestCase;
use Slim\Psr7\Factory\ServerRequestFactory;
class CategoriasTest extends TestCase
{
   // Testa se a API retorna a mensagem inicial.
   public function testApiFuncionando()
   {
       $app = require __DIR__ . '/../src/app.php';
       $request = (new ServerRequestFactory())
           ->createServerRequest('GET', '/');
       $response = $app->handle($request);
       $dados = json_decode((string) $response->getBody(), true);
       $this->assertEquals(200, $response->getStatusCode());
       $this->assertEquals(
           "API de Controle Financeiro funcionando!",
           $dados['mensagem']
       );
   }
}