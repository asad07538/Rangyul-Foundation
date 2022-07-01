<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccEntryItem extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    public function entry(){
        return $this->belongsTo(AccEntry::class,'entry_id','id');
    }
    
    public function ledger(){
        return $this->belongsTo(AccLedger::class,'ledger_id','id');
    }

}
