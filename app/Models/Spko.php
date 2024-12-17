<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spko extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_spko';
    protected $table = 'spkos';
    protected $fillable = ['remarks','employee','trans_date','process','sw'];

    public function employeeRelation()
    {
        return $this->belongsTo(Employee::class, 'employee', 'id_employee');
    }

    public function items()
    {
        return $this->hasMany(SpkoItem::class, 'idm_spko', 'id_spko');
    }
}
