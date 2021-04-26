<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Funcionarios;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionarios::insert([
            [
                'id_loja'          => 1,
                'nome_funcionario' => 'Funcionario 1',
                'email'            => 'funcionario1@teste.com',
                'password'         => bcrypt('teste123'),
                'created_at'       => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'       => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id_loja'          => 2,
                'nome_funcionario' => 'Funcionario 2',
                'email'            => 'funcionario2@teste.com',
                'password'         => bcrypt('teste123'),
                'created_at'       => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'       => Carbon::now()->format('Y-m-d H:i:s')
            ]

        ]);
    }
}
