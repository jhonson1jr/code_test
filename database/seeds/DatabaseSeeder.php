<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LojasSeeder::class,
            ProdutosSeeder::class,
            FuncionariosSeeder::class,
            PedidosSeeder::class,
            PedidosProdutosSeeder::class
        ]);
    }
}
