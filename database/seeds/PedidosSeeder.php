<?php

use App\Pedidos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedidos::insert([
            [
                'nome_cliente' => 'Cliente 1',
                'status'       => 'novo',
                'valor_frete'  => 100.5,
                'id_loja'      => 1,
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome_cliente' => 'Cliente 2',
                'status'       => 'entregue',
                'valor_frete'  => 50.5,
                'id_loja'      => 1,
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome_cliente' => 'Cliente 3',
                'status'       => 'cancelado',
                'valor_frete'  => 20,
                'id_loja'      => 2,
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
