<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              \DB::table('products')->delete();
         Product::create([
       'imagePath' => 'img/10.jpg',
       'title' => 'New Product',
       'description' => 'shop new product here new and you can buy from that web site now ',
       'price' => 1200


        ]);

        
         Product::create([
       'imagePath' => 'img/11.jpg',
       'title' => 'New Product1',
       'description' => 'shop new product here new and you can buy from that web site now ',
       'price' => 1200


        ]);

             
         Product::create([
       'imagePath' => 'img/10.jpg',
       'title' => 'New Product',
       'description' => 'shop new product here new and you can buy from that web site now ',
       'price' => 1200


        ]);
              
         Product::create([
       'imagePath' => 'img/10.jpg',
       'title' => 'New Product',
       'description' => 'shop new product here new and you can buy from that web site now ',
       'price' => 1200


        ]);
    }
}
