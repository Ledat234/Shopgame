<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table='cart';
    protected $primarykey ='id';
    protected $fillable= [
        'quantity','user_id'
    ]   ;
    public function users(){
        return $this->belongsTo('App\Models\Users','user_id');
    
    }
    public function _cart_product(){
        return $this->hasMany('App\Models\CartProduct');
    }
}