<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['rating','coment', 'visitor_id'];

    public function visitor()
    {
        return $this->belongsTo(visitor::class);
    }
}