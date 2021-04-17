<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateQuotationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('quotations',function(Blueprint $table){
            $table->increments("id");
            $table->string("name_of_company");
            $table->string("address");
            $table->string("phone");
            $table->string("email");
            $table->string("contact_person_name");
            $table->string("contact_person_mobile");
            $table->string("item_name");
            $table->string("item_model");
            $table->string("description");
            $table->string("technical_spec");
            $table->string("other_terms");
            $table->string("commercial_terms_condition");
            $table->string("price");
            $table->string("attachement1");
            $table->string("attachement2")->nullable();
            $table->string("attachement3")->nullable();
            $table->string("attachement4")->nullable();
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
        Schema::drop('quotations');
    }

}