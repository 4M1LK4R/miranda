<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    protected $fillable = [
        'name', 'description','phone',
        'address','state'
    ];
    public function sale()
    {
        return $this->belongsTo('');
    }
}
