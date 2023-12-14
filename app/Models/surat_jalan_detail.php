<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_jalan_detail extends Model
{
    use HasFactory;
    protected $primaryKey = "id_surat_jalan_detail";
    public $timestamps = false;
    
    public function surat_jalan()
    {
        return $this->belongsTo(surat_jalan::class,'id_surat_jalan_detail');
    }
    
}
