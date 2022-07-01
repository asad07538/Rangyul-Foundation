<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccEntry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function entryItems(){
        return $this->hasMany(AccEntryItem::class,'entry_id','id');
    }
    
    public function entryType(){
        return $this->belongsTo(AccEntryType::class,'entry_type','id');
    }
    
    public function costCenter(){
        return $this->belongsTo(AccCostCenter::class,'cost_center_id','id');
    }
    

    public function financialYear(){
        return $this->belongsTo(AccFinalYear::class,'fy_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    

    
}
