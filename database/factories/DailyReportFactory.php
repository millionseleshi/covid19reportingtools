<?php

/** @var Factory $factory */

use App\ControlNode;
use App\DailyReport;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(DailyReport::class, function (Faker $faker) {
    factory(ControlNode::class, 1)->create();
    return [
        'new_case_count' => $faker->randomDigit,
        'fatality_count' => $faker->randomDigit,
        'summary' => $faker->sentence,
        'control_node_id' => ControlNode::first()->id,
        'created_at'=>$faker->dateTimeThisYear()
    ];
});
