<?php

namespace Alura\Banco\Servicos;

use Alura\Banco\Modelo\Autenticavel;

class Autenticador
{
    public function tentaAutenticar (Autenticavel $autenticavel, string $senha): void
    {
        if ($autenticavel->podeAutenticar($senha)){
            echo "Ok. Usuário logado no sistema!";
            echo "Ops! Senha incorreta!";
        }
    }
}