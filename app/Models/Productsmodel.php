<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Subcategorymodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Productsmodel extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = 
    [
        'name',
        'description',
        'quantity',
        'wholesale_price',
        'selling_price',
        'expiry_date',
        'restock_threshold'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategorymodel::class, 'subcategories_id');
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacturemodel::class, 'manufacture_id');
    }
}
