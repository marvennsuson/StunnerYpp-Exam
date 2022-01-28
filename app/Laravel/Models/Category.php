<?php

namespace App\Laravel\Models;
use App\Laravel\Models\Music;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{

    use SoftDeletes;
    protected $guarded = [];
	protected $table = 'categories';

    public function music()
    {
        return $this->hasMany(Music::class,'categ_id','id');
    }
}
