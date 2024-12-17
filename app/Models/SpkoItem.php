<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpkoItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'idm';
    protected $table = 'spko_items';
    protected $fillable = ['idm_spko','ordinal','id_product','qty'];

    public function spko()
    {
        return $this->belongsTo(Spko::class, 'idm_spko', 'id_spko');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
