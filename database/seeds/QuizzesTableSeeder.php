<?php

use Illuminate\Database\Seeder;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('quizzes')->truncate();
        DB::table('quizzes')->insert(
            [
              'subject' => 'Number Theory',
              'user_id' => '1',
            ]
        );

        DB::table('questions')->truncate();
        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->truncate();
        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '1' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '1' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '1' ]);

        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '2' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '2' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '2' ]);

        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '3' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '3' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '3' ]);

        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '4' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '4' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '4' ]);

        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '5' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '5' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '5' ]);

        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '6' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '6' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '6' ]);

        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '7' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '7' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '7' ]);
        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '8' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '8' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '8' ]);

        DB::table('questions')->insert(
            [
                'text'    => 'Which of the following numbers is a perfect square?',
                'quiz_id' => '1',
            ]
        );

        DB::table('answers')->insert([ 'text' => '2', 'correct' => 0, 'question_id' => '9' ]);
        DB::table('answers')->insert([ 'text' => '3', 'correct' => 0, 'question_id' => '9' ]);
        DB::table('answers')->insert([ 'text' => '4', 'correct' => 1, 'question_id' => '9' ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
