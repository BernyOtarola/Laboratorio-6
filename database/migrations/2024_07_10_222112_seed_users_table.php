<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeedUsersTable extends Migration
{
    public function up()
    {
        DB::table('users')->insert([
            [
                'name' => 'Andrey',
                'email' => 'andrey@example.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Carlos',
                'email' => 'carlos@example.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Pedro',
                'email' => 'pedro@example.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Sebas',
                'email' => 'sebas@example.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Luis',
                'email' => 'luis@example.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Andrea',
                'email' => 'andrea@example.com',
                'password' => Hash::make('password')
            ],
        ]);
    }

    public function down()
    {
        DB::table('users')->whereIn('email', [
            'andrey@example.com',
            'carlos@example.com',
            'pedro@example.com',
            'sebas@example.com',
            'luis@example.com',
            'andrea@example.com'
        ])->delete();
    }
}
