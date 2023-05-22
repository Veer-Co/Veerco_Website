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
            $table->bigIncrements('id');
            $table->string('product_id', 80)->nullable();
            $table->string('product_slug')->nullable();
            $table->string('product_name');
            $table->string('category_id', 80);
            $table->string('subcategory_id', 80)->nullable();
            $table->string('brand_id', 80)->nullable();
            $table->double('mrp', 20,2);
            $table->double('price', 20,2);
            $table->string('sku', 191);
            $table->string('model_number', 191)->nullable();
            $table->string('hsn', 191)->nullable();
            $table->string('is_top_product', 10)->nullable();
            $table->string('todays_deal', 10)->nullable();
            $table->string('is_featured', 10)->nullable();
            $table->double('weight')->nullable()->comment('Shipping Product Weight');
            $table->double('length')->nullable()->comment('Shipping Product Length');
            $table->double('wide')->nullable()->comment('Shipping Product wide');
            $table->double('height')->nullable()->comment('Shipping Product height');
            $table->string('stock_status', 20)->nullable();
            $table->tinyInteger('store_house')->nullable()->comment('With storehouse management');
            $table->bigInteger('quantity')->nullable()->unsigned();
            $table->tinyInteger('isCheckout')->nullable()->unsigned()->comment('Allow customer checkout when this product out of stock. 1 = allowed, 0 = not allowed');
            $table->bigInteger('est_shipping_days')->nullable();
            $table->integer('tax_id')->nullable()->unsigned();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('overview')->nullable();
            $table->string('seo_title', 120)->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_schema')->nullable();
            $table->string('thumbnail')->nullable();
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
