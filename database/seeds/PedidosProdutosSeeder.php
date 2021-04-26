<?php

use App\PedidosProdutos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PedidosProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PedidosProdutos::insert([
            [
                'quantidade' => 10,
                'preco'      => 505,
                'id_pedido'  => 1,
                'id_produto' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantidade' => 5,
                'preco'      => 126.5,
                'id_pedido'  => 1,
                'id_produto' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantidade' => 1,
                'preco'      => 25.3,
                'id_pedido'  => 2,
                'id_produto' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'quantidade' => 1,
                'preco'      => 15.7,
                'id_pedido'  => 3,
                'id_produto' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}