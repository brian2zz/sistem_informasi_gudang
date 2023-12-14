<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incoming_product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_produk_masuk';
    protected $fillable = ['id_supplier', 'tanggal_masuk', 'keterangan', 'id_produk','id_pembeli', 'jumlah_masuk', 'id_produk_masuk','submit'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_pembeli', 'id_pembeli');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'pivot_incoming_product', 'id_produk_masuk', 'id_produk')
                    ->withPivot('jumlah_masuk','sisa_stok_masuk');
    }

    public function productCategories()
    {
        return $this->hasManyThrough(
            CategoryProduct::class,
            Product::class,
            'id_produk',
            'id_kategori_produk',
            'id_produk'
        );
    }
    public function pivot_laporan()
    {
        return $this->belongsToMany(out_product::class,'pivot_laporan', 'id_produk_keluar', 'id_produk_masuk');
    }
}
