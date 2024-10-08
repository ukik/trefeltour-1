<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCulinarybookingsTablePnox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('culinary_bookings___', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
        });

        Schema::table('culinary_bookings___', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('culinary_customers')->onDelete('restrict')->onUpdate('no action');
        });

        } catch (PDOException $ex) {
            $this->down();
            throw $ex;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('culinary_bookings___', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });
        Schema::table('culinary_bookings___', function (Blueprint $table) {
            $table->dropColumn('customer_id');
        });


    }
}
