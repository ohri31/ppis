<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_case', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('steps');
            $table->text('test_data');
            $table->text('actual_results');
            $table->text('notes')->nullable();
            $table->boolean('status')->default(false);

            $table->integer('test_request_id');
            $table->integer('test_case_type_id');
            $table->integer('expected_result_id');
            
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
        Schema::dropIfExists('test_case');
    }
}
