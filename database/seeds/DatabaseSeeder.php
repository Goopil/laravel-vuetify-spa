<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguageLinesTableSeeder::class);
        $this->call(RoleSeeder::class);
        factory(\App\User::class)->create(['email' => 'zac@goopil.org']);
    }
}
