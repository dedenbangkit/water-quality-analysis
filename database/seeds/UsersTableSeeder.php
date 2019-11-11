<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lars = new App\User([
            "name" => "Lars",
            "email" => "lars@akvo.org",
            "email_verified_at" => now(),
            "password" => bcrypt("secretpassword"),
            "remember_token" => Str::random(10),
        ]);

        $deden = new App\User([
            "name" => "Deden",
            "email" => "deden@akvo.org",
            "email_verified_at" => now(),
            "password" => bcrypt("secret"),
            "remember_token" => Str::random(10),
        ]);

        $lars->save();
        $deden->save();
    }
}
