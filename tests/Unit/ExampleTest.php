<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * Testa pequenas partes do codigo
     * 
     * variaveis de testes estão contidas em phpunit.xml e deve limpar cache antes dos testes com config:clear
     * 
     * @test
     */
    public function passou_aqui(): void
    {
        $this->assertTrue(true);
    }
}
