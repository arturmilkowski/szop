<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(App\Models\Profile::class)->create(
            [
                'user_id' => factory(App\User::class)->create(
                    [
                        'id' => (string) Str::uuid(),
                        'role_id' => 1,
                        'name' => 'artur',
                        'email' => 'artur-milkowski@tlen.pl',
                        'password' => bcrypt('op[]op[]'),
                    ]
                ),
                'lastname' => 'miłkowski',
                'street' => 'armii krajowej 6C/17',
                'zip_code' => '67-100',
                'city' => 'nowa sól',
                'voivodeship_id' => 4,
                'phone' => '505891315',
            ]
        );
        /*
        DB::table('profiles')->insert(
            [
                // 'user_id' => 1,
                'lastname' => 'miłkowski',
                'street' => 'armii krajowej 6C/17',
                'zip_code' => '67-100',
                'city' => 'nowa sól',
                'voivodeship_id' => 4,
                'phone' => '505891315',
            ]
        );
        */
        /*
        DB::table('profiles')->insert(
            [
                'user_id' => 2,
                'lastname' => 'staszkowski',
                'street' => 'baładny 4b/8',
                'zip_code' => '32-600',
                'city' => 'oświęcim',
                'voivodeship_id' => 5,
                'phone' => '123456789',
            ]
        );
        DB::table('profiles')->insert(
            [
                'user_id' => 3,
                'lastname' => 'kowalski',
                'street' => 'akacjowa 1',
                'zip_code' => '10-100',
                'city' => 'kowalewo',
                'voivodeship_id' => 5,
                'phone' => '123456789',
            ]
        );
        DB::table('profiles')->insert(
            [
                'user_id' => 4,
                'lastname' => 'nowak',
                'street' => 'szaserów 15A/16',
                'zip_code' => '99-999',
                'city' => 'warszawa',
                'voivodeship_id' => 5,
                'phone' => '123456789',
            ]
        );
        */
    }
}
