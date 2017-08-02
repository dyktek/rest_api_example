<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'dyktek';
        $user->email = 'dyktek@dyktek.com';
        $user->password = bcrypt('123qwe');
        $user->save();
    }
}
