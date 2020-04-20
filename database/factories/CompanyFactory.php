<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'companyId'=>'CMPY'.$faker->unixTime,
        'name'=>$faker->company,
        'description'=>$faker->text,
        'address'=>$faker->address,
        'country'=>$faker->country,
        'province'=>$faker->state,
        'city'=>$faker->city,
    ];
});
