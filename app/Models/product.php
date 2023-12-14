<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $primaryKey = "id_produk";
    public $timestamps = false;

    protected $fillable = [
        'no_kartu',
        'nama_produk',
        'id_kategori_produk',
        'satuan',
        'stok',
    ];
    
    public function category_products()
    {
        return $this->belongsTo(category_product::class,'id_kategori_produk');
    }
    
    public function incomingProducts()
    {
        return $this->belongsToMany(Incoming_product::class, 'pivot_incoming_product', 'id_produk', 'id_produk_masuk')
                    ->withPivot('jumlah_masuk','sisa_stok_masuk');
    }
    
    public function outProducts()
    {
        return $this->belongsToMany(out_product::class, 'pivot_out_product', 'id_produk', 'id_produk_keluar')
                    ->withPivot('jumlah_keluar','sisa_stok_keluar');
    }
}
