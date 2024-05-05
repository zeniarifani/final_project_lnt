<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Admin;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['category_name'=>'Alat Tulis Kerja']);
        Category::create(['category_name'=>'Pakaian']);
        Category::create(['category_name'=>'Aksesoris']);
        Category::create(['category_name'=>'Buku']);
        Supplier::create(['supplier_name'=>'IntanJaya']);
        Supplier::create(['supplier_name'=>'ParagonGrup']);
        Supplier::create(['supplier_name'=>'JayaWijaya']);
        User::create([
            'name' => 'Johnny Kim',
            'email' => 'johnny@gmail.com',
            'password' => Hash::make('password'),
            'handphone' => '08123456789',
        ]);
        Item::create([
            'product_name'=>'Eraser',
            'category_id'=>'1',
            'price'=>'1000',
            'stock'=>'5',
            'product_photo'=>'',
        ]);
        Admin::create([
            'admin_name' => 'Chipa',
            'id_admin'=>'chipa',
            'admin_email' => 'chipa@gmail.com',
            'admin_password' => Hash::make('chipa'),
            'admin_handphone' => '08123456789',
        ]);
    }

}