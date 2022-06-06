<?php

namespace Alura\Banco\Modelo;

class Pessoa
{
    private Cpf $numeroCpf;
    protected string $nome;

    public function __construct(Cpf $numeroCpf, string $nome)
    {
        $this->numeroCpf = $numeroCpf;
        $this->validarNome($nome);
        $this->nome = $nome;
    }

    protected function validarNome(string $nome): void
    {
        if (strlen($nome) < 5) {
            echo "O nome deve conter 5 ou mais caracteres.";
            exit();
        }
    }

    public function recuperarCpf(): string
    {
        return $this->numeroCpf->recuperarNumeroCpf();
    }

    public function recuperarNome(): string
    {
        return $this->nome;
    }


}