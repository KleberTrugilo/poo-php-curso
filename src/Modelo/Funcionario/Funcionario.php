<?php

namespace Alura\Banco\Modelo\Funcionario;

    use Alura\Banco\Modelo\Cpf;
    use Alura\Banco\Modelo\Pessoa;

    abstract class Funcionario extends Pessoa
    {
        private string $cargo;
        private float $salario;

        public function __construct(Cpf $numeroCpf, string $nome, string $cargo, float $salario)
        {
            parent::__construct($numeroCpf, $nome);
            $this->cargo = $cargo;
            $this->salario = $salario;
        }

        public function recuperarCargo(): string
        {
            return $this->cargo;
        }

        public function alterarNome(string $nome): void
        {
            parent::validarNome($nome);
            $this->nome = $nome;
        }

        public function recuperarSalario(): float
        {
            return $this->salario;
        }

        public function receberAumento(float $valorAumento): void
        {
            if ($valorAumento < 0)
            {
                echo "Aumento deve ser positivo";
                return;
            }
            $this->salario += $valorAumento;
        }

        public function calcularBonificacao(): float
        {
            return $this->salario * 0.1;
        }

    }
