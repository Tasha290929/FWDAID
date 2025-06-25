<?php

namespace Database\Seeders;
use Carbon\Carbon;
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
       DB::table('products')->insert([
    [
        'name' => 'Merrick – Before Grain',
        'description' => 'This is hands down the best dry food for cats. Merrick Before Grain follows all of my guidelines for dry cat food to the letter and is such great value for money as well.

My cats devoured this dry food which I honestly thought would not happen. I had watched as my cats had eaten other more ‘premium’ dry foods on the list and just did not think it would happen with Merrick because of the price difference.',
        'price' => 50.00,
        'category_id' => 1,
        'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
    ],
        [
        'name' => 'Royal Canin – Intense Beauty Gravy',
        'description' => 'A high-quality wet food rich in Omega-3 and Omega-6 fatty acids to support healthy skin and a shiny coat. Cats love the rich gravy and tender meat chunks.',
        'price' => 2.99,
        'category_id' => 2, 
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    [
        'name' => 'Interactive Feather Toy',
        'description' => 'This automatic feather toy will keep your cat entertained for hours. The unpredictable movement simulates prey and encourages natural hunting instincts.',
        'price' => 15.49,
        'category_id' => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]
    
]);

    }
}
