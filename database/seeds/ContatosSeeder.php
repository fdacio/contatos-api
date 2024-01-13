<?php

use App\Contato;
use App\Grupo;
use Illuminate\Database\Seeder;

class ContatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Contato::class, 200)->create();          
    }
}
