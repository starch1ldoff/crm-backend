<?php

$factory->define(\App\Data\Models\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'website' => $faker->address
    ];
});
