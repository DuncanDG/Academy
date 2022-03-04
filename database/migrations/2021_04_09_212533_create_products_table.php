<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedDecimal('price');
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('stock_defective')->default(0);     
            $table->timestamps();
            $table->softDeletes();//this means that you are not deleting the model completey but creating a delete_at timestamp
            //to enable softdelete to a model specify the SOFTDELETE property on the model "Use SoftDeleteTrait"
           $table->foreign('category_id')->references('id')->on('categories');  
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
}
