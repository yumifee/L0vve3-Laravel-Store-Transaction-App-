<?php
/**
 * @Author: Your name
 * @Date:   2022-11-07 07:26:05
 * @Last Modified by:   Your name
 * @Last Modified time: 2022-11-28 07:16:02
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";
    protected $fillable = [
        'Tanggal',
        'Penjualan',
        'Total_Penjualan'
    ];
}
