<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $table = 'indicators';

    protected $fillable = ['name'];

    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
