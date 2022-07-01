<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_ledgers', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('acc_groups');

            $table->string("acc_code");
            $table->string("name");
            $table->float("op_balance", 10, 2)->default(0);
            $table->string("op_balance_dc")->default("D");
            $table->enum("is_bank_cash",['0','1','2']);
            // 1 bank
            // 2 cash
            // 0 No
            $table->boolean("reconciliation")->default(0);
            $table->float("budget", 10, 2)->default(0);

            $table->unsignedBigInteger('fy_id')->nullable();
            $table->foreign('fy_id')->references('id')->on('acc_final_years');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acc_ledgers');
    }
};
