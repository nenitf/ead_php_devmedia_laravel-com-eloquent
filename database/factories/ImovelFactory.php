<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imovel;
use Faker\Generator as Faker;

$factory->define(Imovel::class, function (Faker $faker) {
    return [
        "descricao" => $faker->sentence(4, true),
        "logradouroEndereco" => $faker->streetName,
        "bairroEndereco" => $faker->streetSuffix,
        "numeroEndereco" => $faker->buildingNumber,
        "cepEndereco" => $faker->postcode,
        "cidadeEndereco" => $faker->city,
        "preco" => $faker->randomNumber(6),
        "qtdQuartos" => $faker->randomDigit,
        "tipo" => $faker->randomElement(['apartamento', 'casa', 'kitnet']),
        "finalidade" => $faker->randomElement(['venda', 'locação']),
    ];
});
