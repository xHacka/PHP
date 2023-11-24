<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('quizzes', function (Blueprint $table) {
      $table->id();
      $table->string("title");
      $table->string("description");
      $table->boolean('is_active')->default(true);
      $table->timestamp('updated_at');
      $table->timestamp('created_at');
      $table->timestamp('deleted_at')->nullable();
      $table->string('photo')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('quizzes');
  }
};
