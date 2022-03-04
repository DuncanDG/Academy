<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name', 'description', 'category_id', 'price', 'stock', 'stock_defective'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id')->withTrashed();
    }

  
    
}