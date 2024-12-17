<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_employee';
    protected $table = 'employees';
    protected $fillable = ['entry_date','nama','rank','gender'];
    public $timestamps = true;

    public function spkos()
    {
        return $this->hasMany(Spko::class, 'employee', 'id_employee');
    }
}
