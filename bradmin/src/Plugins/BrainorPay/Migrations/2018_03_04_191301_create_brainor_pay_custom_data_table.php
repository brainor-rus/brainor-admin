<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrainorPayCustomDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('brainor_pay_custom_data')) {
            Schema::create('brainor_pay_custom_data', function (Blueprint $table) {
                $table->string('related_type');
                $table->string('related_key');
                $table->string('foreign_type');
                $table->string('foreign_key');
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
        Schema::dropIfExists('brainor_pay_custom_data');
    }
}
