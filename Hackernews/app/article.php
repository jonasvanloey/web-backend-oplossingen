<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class article extends Model
{
    use SoftDeletes;
    protected $fillable = ['url','title'];
    public function comments(){
        return $this->hasMany(comment::class,'article_ID','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_ID','id');
    }

    protected $dates = ['deleted_at'];
}
