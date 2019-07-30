<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSaleProduct extends Model
{
    protected $fillable =[
        'name_product','amount', 'subtotal','state','sale_id', 'product_id'
    ];
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
