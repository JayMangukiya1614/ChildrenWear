<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCart extends Model
{
    use HasFactory;
    protected $table ="add_carts";
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(ProductListing::class,'product_id','PI_ID');
    }
}
