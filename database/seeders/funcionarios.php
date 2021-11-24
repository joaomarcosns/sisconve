<?php

namespace Database\Seeders;

use App\Models\Funcionarios as ModelsFuncionarios;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class funcionarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionarios = new ModelsFuncionarios();
        $funcionarios->nome_funcionario = 'admin';
        $funcionarios->email = 'admin@admin.com';
        $funcionarios->cpf = '000.000.000.00';
        $funcionarios->telefone = '(77)9 91620945';
        $funcionarios->endereco = 'Rua dos bobos';
        $funcionarios->cargo = 'Administrador';
        $funcionarios->salario = 0;
        $funcionarios->senha = Hash::make('admin');
        $funcionarios->ativo = true;
        $funcionarios->nivel_acesso = 1;
        $funcionarios->id_caixa = 1;
        $funcionarios->save();

        $funcionarios2 = new ModelsFuncionarios();
        $funcionarios2->nome_funcionario = 'Funcionario Caixa';
        $funcionarios2->email = 'caixa@caixa.com';
        $funcionarios2->cpf = '111.111.111.11';
        $funcionarios2->telefone = '(77)9 91111111';
        $funcionarios2->endereco = 'Rua';
        $funcionarios2->cargo = 'CAIXA';
        $funcionarios2->salario = 0;
        $funcionarios2->senha = Hash::make('CAIXA123');
        $funcionarios2->ativo = true;
        $funcionarios2->nivel_acesso = 2;
        $funcionarios2->id_caixa = 2;
        $funcionarios2->save();
    }
}
