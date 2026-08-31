<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::upsert([
            [
                'name' => 'user',
                'slug' => 'user', 
                'description' => 'Default user role.'
            ],
            [
                'name' => 'administrator',
                'slug' => 'admin', 
                'description' => 'Administrator role.'
            ],
            [
                'name' => 'manager',
                'slug' => 'manager', 
                'description' => 'Manager role.'
            ],
        ], ['slug'], ['name', 'description']);
    }
}
