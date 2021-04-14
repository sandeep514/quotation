<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePartyTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('party',function(Blueprint $table){
            $table->increments("id");
            $table->string("name_of_company");
            $table->text("address");
            $table->string("phone");
            $table->string("email");
            $table->string("contact_person_name");
            $table->string("contact_person_mobile");
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
        Schema::drop('party');
    }

}