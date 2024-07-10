<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $fillable = ['name', 'url_photo', 'description', 'route', 'url'];

    public function formats()
    {
        return $this->hasMany(Format::class);
    }
}
