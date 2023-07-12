<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    public $table='category_product';
    protected $primarykey ='id';
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    protected $fillable= [
        'name','description'
    ]   ;
}
