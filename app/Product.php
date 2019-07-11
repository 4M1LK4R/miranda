<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $filla=[
        'id_catalog_product','name', 'description','state'
    ];

    // un producto pertenece a un solo tipo de producto
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }
}
