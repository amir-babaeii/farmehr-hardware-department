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
            $table->string("type");
            $table->string("model");
            $table->string("serie");
            $table->integer("amval_num");
            $table->string("accessories");
            $table->text("other_information");
            $table->text("address");
            $table->timestamp("get_date");
            $table->integer("getter_id");
            $table->string("truble");
            $table->text("repair_information");
            $table->integer("giver_id");
            $table->timestamp("out_date");
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
