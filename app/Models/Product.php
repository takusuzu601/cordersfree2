<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //status 
    const BORRADOR=1;
    const PUBLICADO=2;

    protected $guarded=['id','created_at','updated_at'];

    //リレーション一対多
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    //リレーション　一対多　逆
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //リレーション　多対多
    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    //リレーション　一対多のポリモーフィック
    public function images(){
        return $this->morphMany(Image::class,"imageable");
    }

     // URL AMIGABLES フレンドリーなURLを設定
    // URL Product->idをSlugに変換
    public function getRouteKeyName(){
        return 'slug';
    }
}
