<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('items',function(Blueprint $table){
            $table->increments("id");
            $table->string("item_name");
            $table->string("item_model");
            $table->string("attachment1");
            $table->string("attachment2")->nullable();
            $table->string("attachment3")->nullable();
            $table->string("attachment4")->nullable();
            $table->text("description");
            $table->text("technical_spec");
            $table->text("other_terms");
            $table->text("commercial_terms_condition");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }

}