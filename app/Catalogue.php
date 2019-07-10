<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $fillable = [
        'name', 'type_catalog_id', 'description', 'state'
    ];

    public function typeCatalog()
    {
        return $this->belongsTo(TypeCatalog::class);
    }
}
