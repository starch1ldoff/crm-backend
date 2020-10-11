<?php

use App\Data\Models\Company;

$factory->define(\App\Data\Models\Employee::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'company_id' => Company::inRandomOrder()->first()->id
    ];
});
