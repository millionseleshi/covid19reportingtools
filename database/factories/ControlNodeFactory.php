<?php

/** @var Factory $factory */

use App\ControlNode;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ControlNode::class, function (Faker $faker) {
    \factory(User::class,1)->create();
    return [
        'node_city' => $faker->city,
        'node_subcity' => $faker->address,
        'node_woreda' => $faker->streetName,
        'node_kebela' => $faker->streetAddress,
        'node_name' => $faker->name,
        'node_detail' => $faker->sentence,
        'node_manager' => User::first()->id,
        'node_type' => $faker->randomElement(array('central', 'child')),
    ];
});
