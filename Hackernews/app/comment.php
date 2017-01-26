<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class comment extends Model
{
    protected $fillable = ['text'];
    public function article(){
        return $this->belongsTo(article::class,'article_ID','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_ID','id');
    }
}
