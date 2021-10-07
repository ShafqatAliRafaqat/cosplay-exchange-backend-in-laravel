<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            ['name' => 'Costumes','img'=>'1','img_name'=>'1','created_at'=>$time,'updated_at'=>$time],
            ['name' => 'Accessories','img'=>'1','img_name'=>'1','created_at'=>$time,'updated_at'=>$time],
        ];
        foreach ($items as $item) {
            \App\Models\Category::create($item);
        }
    }
}
