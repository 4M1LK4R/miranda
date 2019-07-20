<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =[
        'id_catalog_zone','id_catalog_client','nit',
        'name','description','phone','address','state'
    ];
    // un cliente pertenece a un solo tipo de cliente (belongsTo)
    public function zoneclient()
    {
        return $this->belongsTo(Catalogue::class);
    }
    public function typeclient()
    {
        return $this->belongsTo(Catalogue::class);
    }
  
}

