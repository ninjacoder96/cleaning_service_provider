<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanerServiceProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaner_service_provider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cleaner_id');
            $table->unsignedBigInteger('service_provider_id');
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
        Schema::dropIfExists('cleaner_service_provider');
    }
}
