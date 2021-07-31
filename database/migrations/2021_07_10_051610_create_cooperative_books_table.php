<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperativeBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperative_books', function (Blueprint $table) {
            $table->id();
            $table->string('book_number');
            $table->string('member_name');
            $table->text('member_photo')->nullable();
            $table->string('nid')->nullable();
            $table->string('member_contact');
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
        Schema::dropIfExists('cooperative_books');
    }
}
