<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('test_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->unsignedInteger('equipment_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id')->default(1);
            $table->unsignedInteger('approved')->default(0);
            $table->unsignedInteger('approvedby_id')->nullable();
            $table->foreign('equipment_id')
                  ->references('id')->on('equipment')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('approvedby_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('status_id')
                  ->references('id')->on('test_requests_statuses')
                  ->onDelete('cascade');

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
        //
    }
}
