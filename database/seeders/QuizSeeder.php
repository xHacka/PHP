<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {
    Quiz::create([
      'title' => 'Quiz 1',
      'description' => 'This is the first quiz.',
    ]);

    Quiz::create([
      'title' => 'Quiz 2',
      'description' => 'This is the second quiz.',
    ]);

    Quiz::create([
      'title' => 'Quiz 3',
      'description' => 'This is the third quiz.',
    ]);

    Quiz::create([
      'title' => 'Quiz 4',
      'description' => 'This is the fourth quiz.',
    ]);

    Quiz::create([
      'title' => 'Quiz 5',
      'description' => 'This is the fifth quiz.',
    ]);
  }
}
