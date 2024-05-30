<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLodgeTableXrgh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('lodge', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
        });

        Schema::table('lodge', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('badaso_users')->onDelete('restrict')->onUpdate('no action');
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
        Schema::table('lodge', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('lodge', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });


    }
}