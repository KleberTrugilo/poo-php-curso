<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Conta\Titular;

abstract class Conta
{

    private Titular $titular;//composição: objeto da classe Titular
    private float $saldo;
    private static $totalDeContas = 0;//membros estáticos referem-se à classe e não às suas instâncias.

    public function __construct(Titular $titular)// como argumente, neste caso, tem a classe e seu objeto
    {
        $this->titular = $titular;// this, refer-se ao objeto(instância).
        $this->saldo = 0;

        self::$totalDeContas++;// self, refere-se à classe
    }

    public function sacar(float $valorASacar): void
    {
        $tarifaSaque = $valorASacar * $this->percentualTarifa();
        $valorSaque = $valorASacar + $tarifaSaque;
        if ($valorSaque > $this->saldo) {
            echo "Saldo insuficiente.";
            return;
        }

        $this->saldo -= $valorSaque;
    }

    abstract public function percentualTarifa(): float;

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar <= 0) {
            echo "O valor do depósito deve ser positivo!";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($this->saldo < $valorATransferir) {
            echo "Saldo insuficiente.";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }

    public function retornarSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperarCpfTitular(): string
    {
        return $this->titular->recuperarCpf();
    }

    public function recuperarNomeTitular(): string
    {
        return $this->titular->recuperarNome();
    }

    /* Ao criar uma nova instância da classe Conta pelo método construtor, já foram definidos como parâmetros
    o cpf e o nome. Para esta regra de negócio, o cpf e o nome do titular não serão mais alterados,
    por isso não há necessidade das funções que definem cpf e nome.

    public function definirCpf(string $cpf): void
    {
        $this->cpfTitular = $cpf;
    }

    public function definirNome(string $nome): void
    {
        $this->nomeTitular = $nome;
    }
    */

    public function validarNome(string $nome): void
    {
        if (strlen($nome) < 5) {
            echo "O nome precisa possuir 5 ou mais caracteres";
            exit();
        }
    }

    public static function recuperarTotalDeContas(): int
    {
        return self::$totalDeContas;
    }

    public function __destruct()
    {
        self::$totalDeContas--;
    }

}
