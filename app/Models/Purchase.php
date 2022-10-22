<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Unit;
use App\Models\Supplier;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier(){
        return $this->belongsTo(supplier::class,'supplier_id','id');
    }

    public function unit(){
        return $this->belongTo(unit::class, 'unit_id','id');
    }
}
