<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    
    protected $fillable = ['user_id', 'item_id', 'comment_text'];
    
    //
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->first();
    }
    
    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }
   
    // Likes
    public function all_likes_comment()
    {
        // // $count = Likes_comment::where('likeable_id', $this->id)->get()->count();
        // return $count;
    }
}