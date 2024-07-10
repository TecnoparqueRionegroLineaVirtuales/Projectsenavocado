<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'datas';

    protected $fillable = ['value', 'date', 'indicator_id', 'station_id'];

    public function stations()
    {
        return $this->hasMany(Station::class);
    }

    public function indicators()
    {
        return $this->hasMany(Indicator::class);
    }
}
