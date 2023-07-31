<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table='category';
    protected $primarykey ='id';
    protected $fillable= [
        'name','description'
    ]   ;
    public function category_product(){
        return $this->hasMany('App\Models\CategoryProduct');
    }
    

}
