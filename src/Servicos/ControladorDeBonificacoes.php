<?php
namespace Alura\Banco\Servicos;
use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private float $totalBonificacoes;

    public function adicionarBonificacaoDe (Funcionario $funcionario): void
    {
        $this->totalBonificacoes += $funcionario->calcularBonificacao();
    }

    public function recuperarTotal(): float
    {
        return $this->totalBonificacoes;
    }

}