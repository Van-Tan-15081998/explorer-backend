<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [
            ['id' => 1, 'name' => 'Lap top 1', 'price' => 1, 'quantity' => 1],
            ['id' => 2, 'name' => 'Lap top 2', 'price' => 2, 'quantity' => 2],
            ['id' => 3, 'name' => 'Lap top 3', 'price' => 3, 'quantity' => 3],
            ['id' => 4, 'name' => 'Lap top 4', 'price' => 4, 'quantity' => 4],
            ['id' => 5, 'name' => 'Lap top 5', 'price' => 5, 'quantity' => 5],
            ['id' => 6, 'name' => 'Lap top 6', 'price' => 6, 'quantity' => 6],
            ['id' => 7, 'name' => 'Lap top 7', 'price' => 7, 'quantity' => 7],
            ['id' => 8, 'name' => 'Lap top 8', 'price' => 8, 'quantity' => 8],
            ['id' => 9, 'name' => 'Lap top 9', 'price' => 9, 'quantity' => 9],
            ['id' => 10, 'name' => 'Lap top 10', 'price' => 10, 'quantity' => 10],
            ['id' => 11, 'name' => 'Lap top 11', 'price' => 11, 'quantity' => 11],
            ['id' => 12, 'name' => 'Lap top 12', 'price' => 12, 'quantity' => 12],
            ['id' => 13, 'name' => 'Lap top 13', 'price' => 13, 'quantity' => 13],
            ['id' => 14, 'name' => 'Lap top 14', 'price' => 14, 'quantity' => 14],
            ['id' => 15, 'name' => 'Lap top 15', 'price' => 15, 'quantity' => 15],
            ['id' => 16, 'name' => 'Lap top 16', 'price' => 16, 'quantity' => 16],
            ['id' => 17, 'name' => 'Lap top 17', 'price' => 17, 'quantity' => 17],
            ['id' => 18, 'name' => 'Lap top 18', 'price' => 18, 'quantity' => 18],
            ['id' => 19, 'name' => 'Lap top 19', 'price' => 19, 'quantity' => 19],
            ['id' => 20, 'name' => 'Lap top 20', 'price' => 20, 'quantity' => 20],
            ['id' => 21, 'name' => 'Lap top 21', 'price' => 21, 'quantity' => 21],
            ['id' => 22, 'name' => 'Lap top 22', 'price' => 22, 'quantity' => 22],
            ['id' => 23, 'name' => 'Lap top 23', 'price' => 23, 'quantity' => 23],
            ['id' => 24, 'name' => 'Lap top 24', 'price' => 24, 'quantity' => 24],
            ['id' => 25, 'name' => 'Lap top 25', 'price' => 25, 'quantity' => 25],
            ['id' => 26, 'name' => 'Lap top 26', 'price' => 26, 'quantity' => 26],
            ['id' => 27, 'name' => 'Lap top 27', 'price' => 27, 'quantity' => 27],
            ['id' => 28, 'name' => 'Lap top 28', 'price' => 28, 'quantity' => 28],
            ['id' => 29, 'name' => 'Lap top 29', 'price' => 29, 'quantity' => 29],
            ['id' => 30, 'name' => 'Lap top 30', 'price' => 30, 'quantity' => 30],
            ['id' => 31, 'name' => 'Lap top 31', 'price' => 31, 'quantity' => 31],
            ['id' => 32, 'name' => 'Lap top 32', 'price' => 32, 'quantity' => 32],
            ['id' => 33, 'name' => 'Lap top 33', 'price' => 33, 'quantity' => 33],
            ['id' => 34, 'name' => 'Lap top 34', 'price' => 34, 'quantity' => 34],
            ['id' => 35, 'name' => 'Lap top 35', 'price' => 35, 'quantity' => 35],
            ['id' => 36, 'name' => 'Lap top 36', 'price' => 36, 'quantity' => 36],
            ['id' => 37, 'name' => 'Lap top 37', 'price' => 37, 'quantity' => 37],
            ['id' => 38, 'name' => 'Lap top 38', 'price' => 38, 'quantity' => 38],
            ['id' => 39, 'name' => 'Lap top 39', 'price' => 39, 'quantity' => 39],
            ['id' => 40, 'name' => 'Lap top 40', 'price' => 40, 'quantity' => 40],
            ['id' => 41, 'name' => 'Lap top 41', 'price' => 41, 'quantity' => 41],
            ['id' => 42, 'name' => 'Lap top 42', 'price' => 42, 'quantity' => 42],
            ['id' => 43, 'name' => 'Lap top 43', 'price' => 43, 'quantity' => 43],
            ['id' => 44, 'name' => 'Lap top 44', 'price' => 44, 'quantity' => 44],
            ['id' => 45, 'name' => 'Lap top 45', 'price' => 45, 'quantity' => 45],
            ['id' => 46, 'name' => 'Lap top 46', 'price' => 46, 'quantity' => 46],
            ['id' => 47, 'name' => 'Lap top 47', 'price' => 47, 'quantity' => 47],
            ['id' => 48, 'name' => 'Lap top 48', 'price' => 48, 'quantity' => 48],
            ['id' => 49, 'name' => 'Lap top 49', 'price' => 49, 'quantity' => 49],
            ['id' => 50, 'name' => 'Lap top 50', 'price' => 50, 'quantity' => 50],
        ];

        DB::table('products')->insert($products);
    }
}
