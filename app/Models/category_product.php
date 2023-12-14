<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori_produk';
    public $timestamps = false;
    public function category_products()
    {
        return $this->hasMany(product::class,'id_produk');
    }
}
