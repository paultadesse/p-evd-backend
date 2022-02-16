<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retailers', function (Blueprint $table) {
            $table->unsignedBigInteger('distributor_id')->nullable()->change();       
            $table->unsignedBigInteger('sub_distributor_id')->nullable()->change();

            $table->dropForeign(['distributor_id']);
            $table->dropForeign(['sub_distributor_id']);
            
            $table->foreign('distributor_id')
                ->references('id')
                ->on('distributors')
                ->onDelete('set null');

            $table->foreign('sub_distributor_id')
                ->references('id')
                ->on('sub_distributors')
                ->onDelete('set null');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retailers', function (Blueprint $table) {
            $table->unsignedBigInteger('distributor_id')->change();       
            $table->unsignedBigInteger('sub_distributor_id')->change();       
        });
    }
}
