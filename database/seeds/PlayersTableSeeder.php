<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert(
            [
                'name' => 'Cedric',
                'points' => 1200
            ],
            DB::table('players')->insert([
                'name' => 'Jon',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Gordon',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Raj',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Itzik',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Jeremy',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Josh',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Irfaan',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Jessica',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Susan',
                'points' => 1200
            ]),
            DB::table('players')->insert([
                'name' => 'Ye',
                'points' => 1200
            ])
        );
    }
}
