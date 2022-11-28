<?php
/**
 * @Author: Your name
 * @Date:   2022-11-07 07:28:55
 * @Last Modified by:   Your name
 * @Last Modified time: 2022-11-28 07:19:03
 */


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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->timestamp('Tanggal Penjualan');
            $table->String('Penjualan');
            $table->Integer('Total Penjualan');
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
        Schema::dropIfExists('Laporan Penjualan');
    }
};
