<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert (
            [
                'first_name' => "Kirba",
                'last_name' => "Malkoc",
                'email' => "bakir.malkoc@gmail.com",
                'address' => "Jezero bb",
                'username' => "bakirmalkoc",
                'password' => "12345",
            ]);
    }
}
