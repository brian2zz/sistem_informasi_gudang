<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sistem_customer_detail extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function detail_customer()
    {
        return $this->belongsTo(sistem_customer::class,'id_pt');
    }

    public function pivot_detail(){
        return $this->hasMany(pivot_sistem_customer_detail::class,'id_sistem_customer_details');
    }

    public function scopeWithRelations($query)
    {
        return $query->with('detail_customer', 'pivot_detail');
    }
}
