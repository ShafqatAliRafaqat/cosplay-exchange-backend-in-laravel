<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time=\Carbon\Carbon::now();
        $items = [
            ['name' => 'Super Admin','created_at'=>$time,'updated_at'=>$time],
            ['name' => 'Admin','created_at'=>$time,'updated_at'=>$time],
            ['name' => 'Staff','created_at'=>$time,'updated_at'=>$time],
            ['name' => 'Member','created_at'=>$time,'updated_at'=>$time],
        ];

        foreach ($items as $item) {
            \App\Models\Role::create($item);
        }
    }
}
