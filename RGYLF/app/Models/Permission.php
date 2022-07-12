<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsToMany(User::class,'user_permissions','permission_id','user_id');
    }
    public function groups(){
        return $this->belongsToMany(Group::class,'group_permissions','permission_id','group_id');
    }

    public function child(){
        return $this->hasMany(Permission::class,'parent_id','id');
    }
    public function parent(){
        return $this->belongsTo(Permission::class,'parent_id','id');
    }
}
