<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // database/migrations/xxxx_xx_xx_xxxxxx_add_brand_id_to_products_table.php
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->after('id'); // hoặc vị trí phù hợp

            // Khóa ngoại liên kết với bảng brands
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['brand_id']);
            // Xóa cột brand_id
            $table->dropColumn('brand_id');
        });
    }
};
