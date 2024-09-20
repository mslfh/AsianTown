<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldToPurchasersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchasers', function (Blueprint $table) {
            $table->string('name');
            $table->integer('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasers', function (Blueprint $table) {
            //
        });
    }
}
