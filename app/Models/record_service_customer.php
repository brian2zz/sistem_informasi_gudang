<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class record_service_customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function customer(){
        return $this->belongsTo(sistem_customer::class,'id_pt','id');
    }

    public function scopeWithRelations($query)
    {
        return $query->with('customer');
    }
}
