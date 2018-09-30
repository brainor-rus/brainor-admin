<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrainorPayBankResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('brainor_pay_bank_responses')) {
            Schema::create('brainor_pay_bank_responses', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('bank_id');
                $table->string('code', 32);
                $table->text('text')->nullable();
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
        Schema::dropIfExists('brainor_pay_bank_responses');
    }
}
