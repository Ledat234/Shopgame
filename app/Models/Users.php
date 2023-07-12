<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['name', 'email', 'password', 'role_id'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function role(){
        return $this->belongsTo('App\Models\Role','role_id');
    }
    public function _review(){
        return $this->hasMany('App\Models\Review');

    }
    public function cart(){
        return $this->hasMany('App\Models\CartS');

    }
    public function order(){
        return $this->hasMany('App\Models\Order');

    }
}