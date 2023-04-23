<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Room;

$factory->define(Room::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker-> word()
    ];
});
