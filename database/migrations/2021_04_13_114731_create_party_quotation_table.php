<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party_quotation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_of_company');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('contact_person_name');
            $table->string('contact_person_mobile');
            $table->string('item_name');
            $table->string('item_model');
            $table->text('description');
            $table->text('technical_spec');
            $table->text('other_terms');
            $table->text('commercial_terms_condition');
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
        Schema::dropIfExists('party_quotation');
    }
}
