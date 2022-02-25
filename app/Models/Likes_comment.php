<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes_comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'likeable_type', 'likeable_id'];

    public function comment()
    {
        return $this->belongsTo(Comments::class, 'likeable_id');
    }
}
