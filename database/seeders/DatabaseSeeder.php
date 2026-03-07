<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 5 User
        $user1 = User::create(['name' => 'Ahmad Fauzi', 'email' => 'ahmad@gmail.com', 'password' => Hash::make('password123')]);
        $user2 = User::create(['name' => 'Siti Nurhaliza', 'email' => 'siti@gmail.com', 'password' => Hash::make('password123')]);
        $user3 = User::create(['name' => 'Budi Santoso', 'email' => 'budi@gmail.com', 'password' => Hash::make('password123')]);
        $user4 = User::create(['name' => 'Dewi Lestari', 'email' => 'dewi@gmail.com', 'password' => Hash::make('password123')]);
        $user5 = User::create(['name' => 'Rizky Pratama', 'email' => 'rizky@gmail.com', 'password' => Hash::make('password123')]);

        // Buat 5 Product (masing-masing milik user berbeda)
        $product1 = Product::create(['name' => 'Laptop ASUS', 'qty' => 10, 'price' => 12500000, 'user_id' => $user1->id]);
        $product2 = Product::create(['name' => 'Mouse Logitech', 'qty' => 50, 'price' => 350000, 'user_id' => $user2->id]);
        $product3 = Product::create(['name' => 'Keyboard Mechanical', 'qty' => 25, 'price' => 750000, 'user_id' => $user3->id]);
        $product4 = Product::create(['name' => 'Monitor Samsung', 'qty' => 8, 'price' => 3200000, 'user_id' => $user4->id]);
        $product5 = Product::create(['name' => 'Headset Gaming', 'qty' => 30, 'price' => 500000, 'user_id' => $user5->id]);

        // Buat 5 Category (masing-masing terhubung ke product)
        Category::create(['name' => 'Elektronik', 'product_id' => $product1->id]);
        Category::create(['name' => 'Aksesoris', 'product_id' => $product2->id]);
        Category::create(['name' => 'Periferal', 'product_id' => $product3->id]);
        Category::create(['name' => 'Display', 'product_id' => $product4->id]);
        Category::create(['name' => 'Audio', 'product_id' => $product5->id]);
    }
}
