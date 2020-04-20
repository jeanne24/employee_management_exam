<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [        
        'employee_id'=>'EMP'.$faker->unixTime,
        'firstname'=>$faker->firstname,
        'lastname'=>$faker->lastname,
        'middlename'=>$faker->lastname,
        'position'=>$faker->jobTitle,
        'hireDate'=>$faker->date,
        'salary'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 10000, $max = 40000),
    ];
});
