<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('stt');
            $table->string('name_user', 50);
            $table->string('phone', 20);
            $table->string('email', 100)->nullable(true);
            $table->timestamp('expires_at');   
            $table->tinyInteger('status')->default(1);
            
            $table->string('device_id', 50);
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
            
            $table->string('service_id', 50);
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        
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
        Schema::dropIfExists('tickets');
    }
}
