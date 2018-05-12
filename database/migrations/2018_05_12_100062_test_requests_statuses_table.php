<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestRequestsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('test_requests_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        // Insert some stuff
     DB::table('test_requests_statuses')->insert(array('name'=>'New'));
     DB::table('test_requests_statuses')->insert(array('name'=>'In progress'));
     DB::table('test_requests_statuses')->insert(array('name'=>'Done'));
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
