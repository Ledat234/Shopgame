<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table='order';
    protected $primarykey ='id';
    protected $fillable= [
        'status','order_date','user_id'
    ]   ;
    public function users(){
        return $this->belongsTo('App\Models\Users','user_id');
    
    }
    public function order_product(){
        return $this->hasMany('App\Models\CartProduct');
    }
}
