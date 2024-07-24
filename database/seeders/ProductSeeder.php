<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proSeed = [];
        // Thêm 10 bản dữ liệu mẫu
        for($i = 1 ; $i <=100;$i++) {
            $proSeed[] = [
                'name' => 'Sản phẩm '.$i,
                'price' => rand(100000,1000000),
                'quantity' => rand(10,100),
                'image' => '',
                'category_id' => rand(1,10),
                'status' => 1,

            ];
        }
        DB::table('products')->insert($proSeed);
    }
}
