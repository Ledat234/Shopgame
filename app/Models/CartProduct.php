<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    public $table='_cart_product';
    protected $primarykey ='id';
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function cart(){
        return $this->belongsTo('App\Models\Cart','cart_id');
    }
    protected $fillable= [
        'product_id','cart_id'
    ]   ;

}