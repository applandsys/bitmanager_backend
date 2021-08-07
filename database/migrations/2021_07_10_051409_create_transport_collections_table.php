<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('transport_id');
            $table->integer('amount');
            $table->string('custom_date');
            $table->string('vehicle_number')->nullable();
            $table->string('driver_name')->nullable();;
            $table->string('license_number')->nullable();;
            $table->string('contact_number')->nullable();;
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
        Schema::dropIfExists('transport_collections');
    }
}
