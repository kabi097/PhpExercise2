<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create()->each(function ($user) {
            $user->save();
        });
        // User::all()->each(function ($user) {
        //     if(rand(0,1)==1) {
        //         $ref_user = User::where('id', '<', $user->id)->get()->random();
        //         $ref_user->referringUsers()->save($user);
        //     }
        // });
    }
}
