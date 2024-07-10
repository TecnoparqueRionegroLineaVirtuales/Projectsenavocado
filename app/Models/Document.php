<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = ['title', 'description', 'url_photo', 'url_file', 'date_publication', 'author_id', 'status'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
