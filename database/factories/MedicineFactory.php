<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Medicine::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'unit'=>'vien'
    ];
});
