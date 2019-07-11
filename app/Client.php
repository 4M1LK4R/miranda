<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =[
        'id_catalog_zone','id_catalog_client','nit',
        'name','description','phone','address'
    ];
    // un cliente pertenece a un solo tipo de cliente (belongsTo)
    public function zoneclient()
    {
        return $this->belongsTo(Catalogue::class,'id_catalog_zone');
    }
    public function catalogueclient()
    {
        return $this->belongsTo(Catalogue::class,'id_catalog_client');
    }
  
}

