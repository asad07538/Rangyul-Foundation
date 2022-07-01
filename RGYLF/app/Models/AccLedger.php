<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccLedger extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    public function entryItems(){
        return $this->hasMany(AccEntryItem::class,'ledger_id','id');
    }

    public function accountGroup(){
        return $this->belongsTo(AccGroup::class,'group_id','id');
    }

    public function financialYear(){
        return $this->belongsTo(AccFinalYear::class,'fy_id','id');
    }

}
