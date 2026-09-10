<?php

namespace Database\Seeders;

use App\Models\Addresses;
use App\Models\Adresses;
use App\Models\Countries;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call([
            RoleSeeder::class,
            CountriesSeeder::class,
            CategoriesSeeder::class
        ]);

        $users = User::factory(25)->create();

        $roles = Role::where('slug', 'user')->firstOrFail();

        /**
         * Attach user role for each user 
         */
        $users->each(function ($user) use($roles) {
            $user->roles()->attach($roles->id);
        });

        /**
         * Create a profile for each user
         */
        $users->each(function ($user) {
            Profile::create([
                'user_id' => $user->id,
                'bio' => fake()->sentence()
            ]);
        });

        $countries = Countries::all();
        /**
         * Make a address for each user
         */
        $users->each(function ($user) use($countries) {
            Addresses::factory(1)->create([
                'user_id' => $user->id,
                'country_id' => $countries->random()->id
            ]);
        });

        $admins = User::factory(2)->create();

        $adminRole = Role::where('slug', 'admin')->firstOrFail();

        $admins->each(function ($admin) use ($adminRole) {
            $admin->roles()->attach($adminRole->id);
        });

        /**
         * Create 5 products for each adm user
         */
        $admins->each(function ($admin) {
            $products = Product::factory(5)->create([
                'user_id' => $admin->id
            ]);

            $products->each(function ($product) {
                ProductImage::factory(1)->create([
                    'product_id' => $product->id
                ]);
            });
        });

        /**
         * Create 5 order for each user 
         */
        $users->each(function ($user) {
            $orders = Order::factory(2)->create([
                'user_id' => $user->id
            ]);

            $products = Product::all();

            $orders->each(function ($order, $key) use ($user, $products) {
                OrderItem::factory(random_int(1, 3))->create([
                    'order_id' => $order->id,
                    'product_id' => $products->random()->id
                ]);
            });
        });
    }
}
