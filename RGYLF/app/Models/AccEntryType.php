<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccEntryType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function entries(){
        return $this->hasMany(AccEntry::class,'entry_type','id');
    }
}
