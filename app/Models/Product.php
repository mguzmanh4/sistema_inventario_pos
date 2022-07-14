<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name','description','sku','purchase_price','selling_price','utility','stock'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
