<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
        return $this->hasMany(Color::class);
    }

    //リレーション　一対多のポリモーフィック
    public function images(){
        return $this->morphMany(Image::class,"imageable");
    }
}
