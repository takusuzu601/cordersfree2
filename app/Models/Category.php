<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name','slug','image','icon'];

    //リレーション　一対多
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //リレーション 多対多
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    //Subcategoryを経由しProductを取得
    public function products(){
        return $this->hasManyThrough(Product::class,Subcategory::class);
    }

    // URL AMIGABLES フレンドリーなURLを設定
    // URL Category->idをSlugに変換
    public function getRouteKeyName(){
        return 'slug';
    }
}
