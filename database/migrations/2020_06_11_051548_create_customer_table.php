<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("phone");
            $table->string("type")->nullable();
            $table->string("model")->nullable();
            $table->string("serie")->nullable();
            $table->integer("amval_num")->nullable();
            $table->string("accessories")->nullable();
            $table->text("other_information")->nullable();
            $table->text("address")->nullable();
            $table->timestamp("get_date")->nullable();
            $table->integer("getter_id")->nullable();
            $table->string("truble")->nullable();
            $table->text("repair_information")->nullable();
            $table->integer("giver_id")->nullable();
            $table->timestamp("out_date")->nullable();
            $table->tinyInteger("situation")->default(0);
            $table->string("situation_text")->nullable();

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
        Schema::dropIfExists('customer');
    }
}
