<?php
use PHPUnit\Framework\TestCase;
use Slim\Psr7\Factory\ServerRequestFactory;
class ResumoTest extends TestCase
{
   // Testa se a resposta da API contém uma mensagem.
   public function testMensagemDaApi()
   {
       $app = require __DIR__ . '/../src/app.php';
       $request = (new ServerRequestFactory())
           ->createServerRequest('GET', '/');
       $response = $app->handle($request);
       $dados = json_decode((string) $response->getBody(), true);
       $this->assertArrayHasKey('mensagem', $dados);
   }
}