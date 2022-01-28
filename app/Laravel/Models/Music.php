<?php

namespace App\Laravel\Models;

use App\Laravel\Models\{User,Category};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Music extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }
    public function categ()
    {
        return $this->belongsTo(Category::class,'categ_id','id');

    }
}
