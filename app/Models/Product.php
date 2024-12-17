<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_product';
    protected $table = 'products';
    protected $fillable = ['sub_category','serial_no','description','carat'];
    public $timestamps = true;
}
