<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\ContaPoupanca;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Funcionario;

$endereco1 = new Endereco('CM', 'JL', 'B','544');

$kleber = new Titular(new Cpf('123.456.789-10'), 'Kleber Trugilo', $endereco1);
$conta1 = new ContaCorrente($kleber);
$conta1->depositar(650);
$conta1->sacar(125);

echo "Saldo: {$conta1->retornarSaldo()}".PHP_EOL;

echo "cpf: {$conta1->recuperarCpfTitular()}, nome: {$conta1->recuperarNomeTitular()}, saldo: {$conta1->retornarSaldo()}, endereço: {$endereco1->recuperaCidade()}". PHP_EOL;

$marcos = new Titular(new Cpf('156.489.753-10'), 'Marcos Piza', $endereco1);
$conta2 = new ContaPoupanca($marcos);
$conta2->depositar(200);
$conta2->sacar(100).PHP_EOL;
echo "cpf: {$conta2->recuperarCpfTitular()}, nome: {$conta2->recuperarNomeTitular()}, saldo: {$conta2->retornarSaldo()}". PHP_EOL;

$endereco2 = new Endereco('a', 'b', 'c', '2');

$maria = new Titular(new Cpf('789.951.357-22'), 'Maria', $endereco2);
$conta3 = new ContaPoupanca($maria);
//var_dump($conta3);
echo "cpf: {$conta3->recuperarCpfTitular()}, nome: {$conta3->recuperarNomeTitular()}, saldo: {$conta3->retornarSaldo()}". PHP_EOL;

echo "total de contas: ", Conta::recuperarTotalDeContas() .PHP_EOL;

$funcionarioJose = new Funcionario(new Cpf('156.654.774-78'), 'Jose Maria', 'caixa');
echo "funcionário: {$funcionarioJose->recuperarNome()}, CPF: {$funcionarioJose->recuperarCpf()}, cargo: {$funcionarioJose->recuperarCargo()}". PHP_EOL;
$funcionarioJose->alterarNome('José Maria Silva');
echo "funcionário: {$funcionarioJose->recuperarNome()}";

