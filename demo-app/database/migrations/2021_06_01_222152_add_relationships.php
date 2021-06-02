<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table) {
            /*
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('warranty_id');
            $table->unsignedBigInteger('shipping_id');

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('warranty_id')->references('id')->on('warranty_types');
            $table->foreign('shipping_id')->references('id')->on('shipping_types');*/
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('warranty_type_id')->constrained();
            $table->foreignId('shipping_type_id')->constrained();
        });
        Schema::table('images', function($table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['warranty_type_id']);
            $table->dropForeign(['shipping_type_id']);
        });
        Schema::table('images', function($table) {
            $table->dropForeign(['product_id']);
        });
    }
}
