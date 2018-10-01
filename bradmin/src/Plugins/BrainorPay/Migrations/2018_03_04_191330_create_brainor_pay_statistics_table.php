<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrainorPayStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('brainor_pay_statistics')) {
            Schema::create('brainor_pay_statistics', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->nullable();
                $table->bigInteger('connection_id')->nullable();
                $table->string('connection_type')->nullable();
                $table->decimal('amount');
                $table->decimal('commission');
                $table->integer('bank_id');
                $table->string('bank_status_id')->nullable();
                $table->string('bank_status_mes')->nullable();
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
        Schema::dropIfExists('brainor_pay_statistics');
    }
}
