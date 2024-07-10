<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $table = 'stations';

    protected $fillable = ['code', 'name', 'latitude', 'longitude', 'municipality_id', 'vereda_id', 'status'];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function vereda()
    {
        return $this->belongsTo(Vereda::class);
    }

    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
