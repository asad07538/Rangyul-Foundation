<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccGroup extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    public function childs(){
        return $this->hasMany(AccGroup::class,'parent_id','id');
    }
    public function parent(){
        return $this->belongsTo(AccGroup::class,'parent_id','id');
    }

    
    public function financialYear(){
        return $this->belongsTo(AccFinalYear::class,'fy_id','id');
    }
    public function ledgers(){
        return $this->hasMany(AccGroup::class,'group_id','id');
    }


    

}
