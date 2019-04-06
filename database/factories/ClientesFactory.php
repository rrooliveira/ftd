<?php

use App\Clientes;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Clientes::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
