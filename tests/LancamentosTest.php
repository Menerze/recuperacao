<?php
use PHPUnit\Framework\TestCase;
use Slim\Psr7\Factory\ServerRequestFactory;
class LancamentosTest extends TestCase
{
   // Testa se a API responde com JSON.
   public function testRespostaEmJson()
   {
       $app = require __DIR__ . '/../src/app.php';
       $request = (new ServerRequestFactory())
           ->createServerRequest('GET', '/');
       $response = $app->handle($request);
       $this->assertEquals(200, $response->getStatusCode());
       $this->assertEquals(
           'application/json',
           $response->getHeaderLine('Content-Type')
       );
   }
}