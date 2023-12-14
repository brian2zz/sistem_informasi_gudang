<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class out_product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_produk_keluar';
    protected $fillable = ['id_pembeli', 'tanggal_keluar', 'keterangan', 'id_produk','id_supplier', 'jumlah_keluar', 'id_produk_keluar','submit'];

    public function customer()
    {
        return $this->belongsTo(customer::class, 'id_pembeli', 'id_pembeli');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'pivot_out_product', 'id_produk_keluar', 'id_produk')
                    ->withPivot('jumlah_keluar','sisa_stok_keluar');
    }

    public function pivot_laporan()
    {
        return $this->belongsToMany(incoming_product::class,'pivot_laporan', 'id_produk_masuk', 'id_produk_keluar');
    }

}
