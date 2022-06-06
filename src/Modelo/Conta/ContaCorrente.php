<?php

namespace Alura\Banco\Modelo\Conta;

class ContaCorrente extends Conta
{
    public function percentualTarifa(): float
    {
        return $tarifa = 0.05;
    }
}