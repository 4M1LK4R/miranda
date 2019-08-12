<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =[
        'collector_id','sale_id','state','payment','entry_date'
    ];

    public function collectors()
    {
        return $this->belongsToMany(Sale::class);
    }

}
