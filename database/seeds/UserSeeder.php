<?php

use App\Models\Coin;
use App\Models\Profile;
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
        $user=\App\User::create([
            'role_id' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123')
        ]);
        if($user){
            Profile::create([
                'user_id'=>$user->id
            ]);
            Coin::create([
                'user_id'=>$user->id
            ]);
        }
    }
}
