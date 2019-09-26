<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model;
use Faker\Generator as Faker;
use App\Http\Controllers\ProjectsController;


$factory->define(\App\Project::class, function (Faker $faker) {
    return [
        'project_name' => $faker->name,
        'desc' => $faker->text(50),
        'image_name' => '1568855528.jpeg',
        'customer_id' => ProjectsController::getId(),

    ];
});
