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
        Schema::create('acc_entry_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('entry_id')->nullable();
            $table->foreign('entry_id')->references('id')->on('acc_entries');  
            
            $table->unsignedBigInteger('ledger_id')->nullable();
            $table->foreign('ledger_id')->references('id')->on('acc_ledgers');  
            
            $table->float("amount", 10, 2);
            $table->string("dc");
            $table->date("reconciliation_date")->nullable();
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
        Schema::dropIfExists('acc_entry_items');
    }
};
