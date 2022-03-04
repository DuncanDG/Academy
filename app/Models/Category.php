<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;   
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //not to delete the catergory permanently but to create a delete_at instead
    use SoftDeletes;
    //to use this specfic table
    protected $table = 'categories';
    //to enable mass assingment to this table only
    protected $fillable = ['name'];
    //a category can have many products relationship so that we may use model relationship
    public function products(){
         return $this->hasMany('App\Models\Product');
    }
}
