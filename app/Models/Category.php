<?php

namespace App\Models;

use App\Models\Productsmodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = 
    [
        'name',
        'description',
    ];

    public function subcategory()
    {
        return $this->hasMany('App\Models\Subcategorymodel');
    }

    public function products()
    {
        return $this->hasMany(Productsmodel::class, 'categories_id');
    }
}
