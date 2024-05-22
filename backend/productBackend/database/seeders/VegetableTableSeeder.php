<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vegetables;

class VegetableTableSeeder extends Seeder { 
   
    public function run() { 
        
    $products = [
            [ 'id' => 1,  'name' => 'Raddishes',   'icon' => 'raddish',    'price_usd' => 3.26, 'price_nok' => 17.43, 'type' => 'vegetable' ],
            [ 'id' => 2,  'name' => 'Artichokes',  'icon' => 'artichoke',  'price_usd' => 9.44, 'price_nok' => 15.82, 'type' => 'vegetable' ],
            [ 'id' => 3,  'name' => 'Broccoli',    'icon' => 'broccoli',   'price_usd' => 5.20, 'price_nok' => 16.66, 'type' => 'vegetable' ],
            [ 'id' => 5,  'name' => 'Cabbages',    'icon' => 'cabbage',    'price_usd' => 0.95, 'price_nok' => 62.33, 'type' => 'vegetable' ],
            [ 'id' => 6,  'name' => 'Cherries',    'icon' => 'cherry',     'price_usd' => 1.04, 'price_nok' => 62.50, 'type' => 'fruit'     ],
            [ 'id' => 7,  'name' => 'Carrots',     'icon' => 'carrot',     'price_usd' => 4.82, 'price_nok' => 72.74, 'type' => 'vegetable' ],
            [ 'id' => 8,  'name' => 'Corn',        'icon' => 'corn',       'price_usd' => 7.53, 'price_nok' => 99.43, 'type' => 'vegetable' ],
            [ 'id' => 9,  'name' => 'Grapes',      'icon' => 'grapes',     'price_usd' => 4.94, 'price_nok' => 88.29, 'type' => 'fruit'     ],
            [ 'id' => 10, 'name' => 'Onions',      'icon' => 'onion',      'price_usd' => 6.45, 'price_nok' => 69.53, 'type' => 'vegetable' ],
            [ 'id' => 11, 'name' => 'Oranges',     'icon' => 'orange',     'price_usd' => 9.95, 'price_nok' => 96.53, 'type' => 'fruit'     ],
            [ 'id' => 12, 'name' => 'Peas',        'icon' => 'peas',       'price_usd' => 2.61, 'price_nok' => 65.74, 'type' => 'vegetable' ],
            [ 'id' => 13, 'name' => 'Pineapples',  'icon' => 'pineapple',  'price_usd' => 1.62, 'price_nok' => 35.22, 'type' => 'fruit'     ],
            [ 'id' => 14, 'name' => 'Steaks',      'icon' => 'steak',      'price_usd' => 8.32, 'price_nok' => 83.08, 'type' => 'meat'      ],
            [ 'id' => 15, 'name' => 'Watermelons', 'icon' => 'watermelon', 'price_usd' => 5.08, 'price_nok' => 89.69, 'type' => 'fruit'     ],
            [ 'id' => 16, 'name' => 'Sausages',    'icon' => 'sausage',    'price_usd' => 3.69, 'price_nok' => 26.68, 'type' => 'meat'      ]
        ];
        

    foreach ($products as $product) { 
        Vegetables::create($product);
    }

}

}