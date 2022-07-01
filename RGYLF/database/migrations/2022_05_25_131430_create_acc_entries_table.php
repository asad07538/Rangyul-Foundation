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
        Schema::create('acc_entries', function (Blueprint $table) {
            $table->id();
            $table->string("tag_id")->nullable();
            $table->integer("entry_type");
            $table->integer("number")->nullable();
            $table->date("date")->now();
            $table->float("dr_total", 10, 2)->default(0);
            $table->float("cr_total", 10, 2)->default(0);
            $table->text("narration")->nullable();
            $table->string("cheque_no")->nullable();

            $table->integer("project_id")->default(0);

            $table->unsignedBigInteger('cost_center_id')->nullable();
            $table->foreign('cost_center_id')->references('id')->on('acc_cost_centers');  
            

            $table->unsignedBigInteger('fy_id')->nullable();
            $table->foreign('fy_id')->references('id')->on('acc_final_years');  


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');  

            // $table->integer("cancelled");
            // $table->integer("verified_by");
            // $table->integer("verification_date");
            // $table->integer("verification_description");
            // $table->integer("approved_by");
            // $table->integer("approval_description");
            // $table->date("approval_date");
            $table->string("custom_type")->nullable();
            $table->string("status");
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
        Schema::dropIfExists('acc_entries');
    }
};
