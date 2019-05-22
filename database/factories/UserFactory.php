<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    // $user_ref = (User::all()->count()>0) ? User::all()->random() : false;
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'active' => rand(0,1) == 1, 
        'banned' => false, 
        'notifable_email' => false, 
        'votes' => rand(0,100), 
        'geo' => $faker->address, 
        'lang' => $faker->languageCode,
        // 'ref_status' => ($user_ref) ? true : null , 
        // 'ref' => ($user_ref) ? $user_ref->id : null ,
        //'ref_code' => "CG_".$user_ref->id,
    ];
});
