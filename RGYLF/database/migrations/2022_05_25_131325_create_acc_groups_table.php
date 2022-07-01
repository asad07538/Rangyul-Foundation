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
        Schema::create('acc_groups', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('acc_groups');  

            $table->string("group_code")->nullable();
            $table->string("name");

            $table->unsignedBigInteger('fy_id')->nullable();
            $table->foreign('fy_id')->references('id')->on('acc_final_years');  

            $table->integer("affects_gross")->default(0);
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
        Schema::dropIfExists('acc_groups');
    }
};
