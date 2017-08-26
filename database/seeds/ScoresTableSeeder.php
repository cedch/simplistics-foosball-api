<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert(
            [
                'winner_id' => 1,
                'loser_id' => 2,
                'winner_score' => 10,
                'loser_score' => 4
            ]
        );

        DB::table('scores')->insert(
            [
                'winner_id' => 1,
                'loser_id' => 4,
                'winner_score' => 10,
                'loser_score' => 6
            ]
        );

        DB::table('scores')->insert(
            [
                'winner_id' => 2,
                'loser_id' => 3,
                'winner_score' => 10,
                'loser_score' => 9
            ]
        );
    }
}
