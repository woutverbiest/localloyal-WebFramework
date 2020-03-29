<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Wout Verbiest',
                'email' => 'wout.verbiest@student.howest.be',
                'password' => bcrypt(12345)
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.doe@mail.com',
                'password' => bcrypt('johndoe')
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane.doe@mail.com',
                'password' => bcrypt('janedoe')
            ]
        ];

        //TODO PASSWORDS ARE CLEAR IN DATABASE

        foreach($users as $user){
            User::create($user);
        }
    }
}
