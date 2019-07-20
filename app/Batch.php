<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable =[
        'id',
        'product_id',
        'user_id',
        'provider_id',
        'line_id',
        'storage_id',
        'industry_id',
        'payment_status_id',
        'payment_type_id',
        'code',
        'description',
        'initial_stock',
        'stock',
        'batch_price',
        'wholesaler_price',
        'retail_price',
        'entry_date',
        'expiration_date',
        'state'

    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function provider()
    {
        return $this->hasOne(Provider::class);
    }

    public function line()
    {
        return $this->hasOne(Catalogue::class);
    }
    public function storage()
    {
        return $this->hasOne(Catalogue::class);
    }
    public function industry()
    {
        return $this->hasOne(Catalogue::class);
    }
    public function payment_status()
    {
        return $this->hasOne(Catalogue::class);
    }
    public function payment_type()
    {
        return $this->hasOne(Catalogue::class);
    }


}
