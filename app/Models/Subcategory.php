<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subcategory extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    //リレーション　一対多
    public function products(){
        return $this->hasMany(Product::class);
    }

    //リレーション 一対多 逆
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
