<?php

namespace Database\Seeders;

use App\Models\Addresses;
use App\Models\Adresses;
use App\Models\Countries;
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
        $this->call(
            RoleSeeder::class,
            CountriesSeeder::class,
        );

        $users = User::factory(10)->create();

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
            $user->addresses()->create([
                'country_id' => $countries->random()->id
            ]);
        });
    }
}
