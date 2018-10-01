<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrainorPayCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('brainor_pay_commissions')) {
            Schema::create('brainor_pay_commissions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('bank_id');
                $table->decimal('value');
                $table->decimal('min_value');
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
        Schema::dropIfExists('brainor_pay_commissions');
    }
}
