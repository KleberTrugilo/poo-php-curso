<?php

namespace Alura\Banco\Modelo;
class Cpf
{
    private string $numeroCpf;

    public function __construct(string $numeroCpf)
    {
        $numeroCpf = filter_var($numeroCpf, FILTER_VALIDATE_REGEXP,
            [
                'options' => ['regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/']
            ]
        );
        if ($numeroCpf === false) {
            echo "CPF inválido!";
            exit();
        }
        $this->numeroCpf = $numeroCpf;
    }

    public function recuperarNumeroCpf(): string
    {
        return $this->numeroCpf;
    }


}
