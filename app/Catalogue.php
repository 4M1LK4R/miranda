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
    // un tipo de cliente tiene muchos cliente (hasMany)
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    // un tipo de producto tiene muchos productos 
    public function products()
    {
        return $this->hasMany(Client::class);
    }
    // un tipo de producto tiene muchos productos 
    public function providers()
    {
        return $this->hasMany(Provider::class);
    }
}
