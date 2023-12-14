<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_jalan extends Model
{
    use HasFactory;
    protected $primaryKey = "id_surat_jalan";
    public $timestamps = false;
    
    public function suratJalanDetails()
    {
        return $this->hasMany(surat_jalan_detail::class, 'id_surat_jalan');
    }
}
