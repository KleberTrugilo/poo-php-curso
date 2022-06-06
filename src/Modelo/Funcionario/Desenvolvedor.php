<?php

namespace Alura\Banco\Modelo\Funcionario;

class Desenvolvedor extends Funcionario
{
    public function subirDeNivel()
    {
        $this->receberAumento($this->recuperarSalario() * 0.75);
    }
}