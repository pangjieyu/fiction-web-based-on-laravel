<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('bookId');
            $table->string('title');
            $table->string('bookIntroduction');
            $table->integer('hits');
            $table->integer('typeId');
            $table->boolean('bookType');
            $table->string('cover');
            $table->string('authorName');
            $table->integer('authorId')->index();
            $table->boolean('audit')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
