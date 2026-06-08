<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Zoha Javed',
            'email' => 'zohajaved.098@gmail.com',
            'password' => Hash::make('ZohaJaved12!'),
        ]);

        $testerAdmin = User::create([
            'name' => 'Tester Admin',
            'email' => 'tester@gmail.com',
            'password' => Hash::make('testerAdmin123!'),
        ]);

        // Attach roles
        $adminRole = Role::where('name', 'admin')->first();

        $admin->roles()->attach($adminRole->id);
        $testerAdmin->roles()->attach($adminRole->id);
    }
}
