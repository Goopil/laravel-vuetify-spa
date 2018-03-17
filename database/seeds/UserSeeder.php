<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = \Spatie\Permission\Models\Role::all();

        $roles->each(function (\Spatie\Permission\Models\Role $role) {
            /**
             * @var $user \App\User
             */
            $user = factory(\App\User::class)->create([
                'name' => ucfirst($role->name),
                'email' => "{$role->name}@example.com"
            ]);

            // user role is already registered in observer
            if ($role->name !== 'user') {
                $user->roles()->attach($role);
            }
        });
    }
}
