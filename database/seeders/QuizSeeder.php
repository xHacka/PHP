<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder {
  /**
   * Run the database seeds.
   */

  private $images = [
    "https://images.unsplash.com/photo-1606326608606-aa0b62935f2b",
    "https://images.unsplash.com/photo-1539628399213-d6aa89c93074",
    "https://images.unsplash.com/photo-1520004434532-668416a08753",
    "https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e"
  ];
  private $quiz_counter = 0;

  public function run(): void {
    for ($i = 0; $i < 8; $i++) {
      $this->good();
    }
    $this->no_desc_with_image();
    $this->no_image_with_desc();
    $this->not_active();
    for ($i = 0; $i < 8; $i++) {
      $this->random();
    }
  }

  private function good(): void {
    $this->quiz_counter++;
    $this->create(
      "Quiz {$this->quiz_counter}",
      "This is quiz N{$this->quiz_counter}.",
      true,
      $this->get_random_image()
    );
  }

  private function no_desc_with_image(): void {
    $this->quiz_counter++;
    $this->create(
      "Quiz {$this->quiz_counter}",
      "",
      true,
      $this->get_random_image()
    );
  }

  private function no_image_with_desc(): void {
    $this->quiz_counter++;
    $this->create(
      "Quiz {$this->quiz_counter}",
      "This is quiz N{$this->quiz_counter}.",
      true,
      null
    );
  }

  private function not_active(): void {
    $this->quiz_counter++;
    $this->create(
      "Quiz {$this->quiz_counter}",
      "This is quiz N{$this->quiz_counter}.",
      false,
      $this->get_random_image()
    );
  }

  public function random(): void {
    $this->quiz_counter++;
    $this->create(
      "Quiz {$this->quiz_counter}",
      rand(0, 1) == 0 ? "This is quiz N{$this->quiz_counter}." : "",
      rand(0, 1) == 0 ? true : false,
      rand(0, 1) == 0 ? $this->get_random_image() : ""
    );
  }

  private function create(string $title, string $description, bool $is_active, ?string $photo): void {
    Quiz::create([
      "title" => $title,
      "description" => $description,
      "is_active" => $is_active,
      "photo" => $photo
    ]);
  }

  private function get_random_image(): string {
    return $this->images[rand(0, count($this->images) - 1)];
  }
}
