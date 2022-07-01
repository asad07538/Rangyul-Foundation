<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ledger(){
        return $this->belongsTo(AccLedger::class,'acc_ledger_id','id');
    }

}
