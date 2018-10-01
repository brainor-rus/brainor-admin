<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrainorPayBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('brainor_pay_banks')) {
            Schema::create('brainor_pay_banks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 1024);
                $table->integer('bik');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brainor_pay_banks');
    }
}
