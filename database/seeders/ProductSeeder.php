<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Guesser\Name;
use Faker\Provider\PhoneNumber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Generator\NameGeneratorFactory;
use Ramsey\Uuid\Type\Integer;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = range(0,20);
        foreach ($arrays as $valor) {
            DB::table('products')->insert([
                'name_product' => Name::class,
                'reference' => Name::class,
                'price' => rand(100, 9999),
                'weight' => rand(1, 99),
                'category' => NameGeneratorFactory::class,
                'stock' => rand(1, 99),
            ]);
        }
    }
}
