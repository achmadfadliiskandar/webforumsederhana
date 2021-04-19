<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = ["id","jawaban","post_id"];

    public function post(){
        return $this->belongsTo(post::class);
    }
}
