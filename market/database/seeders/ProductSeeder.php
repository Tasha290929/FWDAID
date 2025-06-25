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
    ]
    
]);

    }
}
