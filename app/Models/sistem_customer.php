<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sistem_customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function detail_customer()
    {
        return $this->hasMany(sistem_customer_detail::class,'id_pt');
    }

    public function record_service(){
        return $this->hasMany(record_service_customer::class,'id','id_pt');
    }
}
