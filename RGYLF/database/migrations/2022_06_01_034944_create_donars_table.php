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
        Schema::create('donars', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("father_name")->nullable();
            $table->string("cnic")->nullable();
            $table->string("dob")->nullable();
            $table->string("marital_status")->default('Married');
            $table->string("gender")->default('Male');
            

            $table->string("country")->nullable();
            $table->string("district")->nullable();
            $table->string("tehsil")->nullable();
            $table->string("address")->nullable();

            $table->string("contact_no")->nullable();
            $table->string("whatsapp_no")->nullable();


            // account details 
            $table->string("account_name")->nullable();
            $table->string("account_cnic")->nullable();
            $table->string("account_crm_no")->nullable();
            $table->string("account_title")->nullable();
            $table->string("account_no")->nullable();
            $table->string("account_type")->nullable();

            $table->string("email")->nullable();
        
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');  

            $table->unsignedBigInteger('acc_ledger_id')->nullable();
            $table->foreign('acc_ledger_id')->references('id')->on('acc_ledgers');  

            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users'); 

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
        Schema::dropIfExists('donars');
    }
};
