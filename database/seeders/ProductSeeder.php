<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('No users found. Run UserFactory first.');
            return;
        }

        $products = [
            [
                'name' => 'Laptop Lenovo ThinkPad',
                'qty' => 5,
                'price' => 12000000,
                'user_id' => $users->first()->id,
            ],
            [
                'name' => 'Monitor Dell 27"',
                'qty' => 8,
                'price' => 3500000,
                'user_id' => $users->first()->id,
            ],
            [
                'name' => 'Keyboard Mechanical RGB',
                'qty' => 15,
                'price' => 800000,
                'user_id' => $users->count() > 1 ? $users->last()->id : $users->first()->id,
            ],
            [
                'name' => 'Mouse Logitech MX Master',
                'qty' => 10,
                'price' => 1200000,
                'user_id' => $users->count() > 1 ? $users->last()->id : $users->first()->id,
            ],
            [
                'name' => 'Webcam Logitech C920',
                'qty' => 6,
                'price' => 1500000,
                'user_id' => $users->first()->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('Products seeded successfully!');
    }
}
