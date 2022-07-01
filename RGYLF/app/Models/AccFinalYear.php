<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccFinalYear extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function accountGroups(){
        return $this->hasMany(AccGroup::class,'fy_id','id');
    }

    public function accountLedgers(){
        return $this->hasMany(AccLedger::class,'fy_id','id');
    }
    

    public function entries(){
        return $this->hasMany(AccFinalYear::class,'fy_id ','id');
    }
    
}
