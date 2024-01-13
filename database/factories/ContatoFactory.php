<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contato;
use App\Grupo;
use Faker\Generator as Faker;

$factory->define(Contato::class, function (Faker $faker) {
    $grupos = Grupo::all();
    return [
        'nome' => $faker->name(),
        'email' => $faker->email(),
        'telefone' => $faker->phone(),
        'id_grupo' => $grupos->random()
    ];
});
