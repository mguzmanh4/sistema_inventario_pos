<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shopping extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id','purchased_amount','vendor','cost'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
