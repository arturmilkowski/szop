<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /*
        DB::table('users')->insert(
            [
                'id' => (string) Str::uuid(),
                'role_id' => 1,
                'name' => 'artur',
                'email' => 'artur-milkowski@tlen.pl',
                'password' => bcrypt('12345678'),
            ]
        );
        */
        /*
        // user without profile
        DB::table('users')->insert(
            [
                'role_id' => 2,
                'name' => 'staszek',
                'email' => 'staszek@tlen.pl',
                'password' => bcrypt('12345678')
            ]
        );
        DB::table('users')->insert(
            [
                'role_id' => 3,
                'name' => 'jan',
                'email' => 'jan@tlen.pl',
                'password' => bcrypt('12345678')
            ]
        );
        DB::table('users')->insert(
            [
                'role_id' => 3,
                'name' => 'wolfgang',
                'email' => 'w@w.pl',
                'password' => bcrypt('12345678')
            ]
        );
        */
        // factory(App\User::class, 1)->create();
    }
}
