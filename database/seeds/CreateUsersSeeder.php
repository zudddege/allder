<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'is_status_user' => '1',
            'password' => bcrypt('1234'),
        ]);
    }
}
