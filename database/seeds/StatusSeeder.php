<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
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
            ['name' => 'New','created_at'=>$time,'updated_at'=>$time],
            ['name' => 'Processing','created_at'=>$time,'updated_at'=>$time],
            ['name' => 'Dispatched','created_at'=>$time,'updated_at'=>$time],
            ['name' => 'Delivered','created_at'=>$time,'updated_at'=>$time],
        ];
        foreach ($items as $item) {
            \App\Models\Status::create($item);
        }
    }
}
