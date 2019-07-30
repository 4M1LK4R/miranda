<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable =[
        'date','total', 'client_id','seller_id','discount', 'expiration_discount','state'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
