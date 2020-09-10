<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    private const TABLE_NAME = 'question';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->text('description');
            $table->enum('answer_key', ['a', 'b', 'c', 'd', 'e']);
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d')->nullable();
            $table->string('option_e')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->foreign('quiz_id')->references('id')->on('quiz');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}

