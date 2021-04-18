<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   protected $HasFactory;
    protected $table = "post";
    // protected $fillable = ["title","body","user_id"];

    protected $guarded = [];

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }
}
