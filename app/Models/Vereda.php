<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vereda extends Model
{
    use HasFactory;

    protected $table = 'veredas';

    protected $fillable = ['name','municipality_id'];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
