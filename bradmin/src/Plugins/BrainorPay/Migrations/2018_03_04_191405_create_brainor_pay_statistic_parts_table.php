<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrainorPayStatisticPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('brainor_pay_statistic_parts')) {
            Schema::create('brainor_pay_statistic_parts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('pay_statistic_id');
                $table->bigInteger('connection_id')->nullable();
                $table->string('connection_type')->nullable();
                $table->decimal('amount');
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
        Schema::dropIfExists('brainor_pay_statistic_parts');
    }
}
