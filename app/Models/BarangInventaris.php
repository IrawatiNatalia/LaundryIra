<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangInventaris extends Model
{
    use HasFactory;
    protected $table = "baranginventaris";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    protected $fillable = ['nama_barang', 'merk_barang', 'qty', 'kondisi', 'tgl_pengadaan'];
}
