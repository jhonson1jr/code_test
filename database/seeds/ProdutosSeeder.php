<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Produtos;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produtos::insert([
            [
                'codigo'        => '1000001',
                'nome_produto'  => 'Produto 1',
                'descricao'     => 'Detalhes do produto 1',
                'qtde_estoque'  => 10,
                'preco'         => 50.5,
                'peso'          => 10,
                'dimensao'      => '5x5x5',
                'tipo'          => 'seco',
                'disponivel'    => 's',
                'id_loja'       => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'codigo'        => '1000002',
                'nome_produto'  => 'Produto 2',
                'descricao'     => 'Detalhes do produto 2',
                'qtde_estoque'  => 15,
                'preco'         => 25.3,
                'peso'          => 5.5,
                'dimensao'      => '15x5x5',
                'tipo'          => 'seco',
                'disponivel'    => 's',
                'id_loja'       => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'codigo'        => '1000003',
                'nome_produto'  => 'Produto 10',
                'descricao'     => 'Detalhes do produto 10',
                'qtde_estoque'  => 20,
                'preco'         => 10.8,
                'peso'          => 0.1,
                'dimensao'      => '1x1x2',
                'tipo'          => 'refrigerado',
                'disponivel'    => 's',
                'id_loja'       => 2,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'codigo'        => '1000004',
                'nome_produto'  => 'Produto 20',
                'descricao'     => 'Detalhes do produto 20',
                'qtde_estoque'  => 25,
                'preco'         => 15.7,
                'peso'          => 100,
                'dimensao'      => '105x55x105',
                'tipo'          => 'seco',
                'disponivel'    => 's',
                'id_loja'       => 2,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
