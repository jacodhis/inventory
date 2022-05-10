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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sku_no')->nullable();
            $table->foreignId('category_id')->nullable();
            
            $table->string('p_price')->nullable();
            $table->string('s_price')->nullable();
            $table->String('entry')->nullable();
            $table->String('sold')->nullable();
            $table->String('bought')->nullable();
            $table->foreignId('state_id')->default(1);
            $table->string('amount')->default(0);

            $table->string('s_vat')->nullable();
            $table->string('rrp_plus_vat')->nullable();
            $table->string('rrp_less_vat')->nullable();

            $table->string('p_vat')->nullable();
            $table->string('pp_plus_vat')->nullable();
            $table->string('pp_less_vat')->nullable();



            $table->unsignedBigInteger('property_id')->nullable();
            $table->index('property_id');
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
        Schema::dropIfExists('products');
    }
};
