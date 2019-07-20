<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'id_catalog_product','name', 'description','state'
    ];

    // un producto pertenece a un solo tipo de producto
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }
    public function batchs()
    {
        return $this->belongsToMany(Batch::class);
    }
}
