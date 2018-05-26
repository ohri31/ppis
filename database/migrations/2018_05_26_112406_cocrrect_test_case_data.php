<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CocrrectTestCaseData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_case', function (Blueprint $table) {
            //
            $table->text('steps')->nullable()->change();
            $table->text('test_data')->nullable();
            $table->text('actual_results')->nullable()->change();

            $table->dropColumn('test_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_case', function (Blueprint $table) {
            //
        });
    }
}
