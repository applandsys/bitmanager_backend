<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bit_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('bit_id');
            $table->decimal('utility', 5, 2)->nullable()->default(0.00);
            $table->decimal('fare', 5, 2)->nullable()->default(0.00);
            $table->decimal('collection_due', 5, 2)->nullable()->default(0.00);
            $table->decimal('due', 5, 2)->nullable()->default(0.00);
            $table->string('collection_date')->nullable();
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
        Schema::dropIfExists('bit_collections');
    }
}
