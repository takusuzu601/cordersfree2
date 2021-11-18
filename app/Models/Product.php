<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //accesores

    public function getStockAttribute(){
        if ($this->subcategory->size) {
            return  ColorSize::whereHas('size.product', function(Builder $query){
                        $query->where('id', $this->id);
                    })->sum('quantity');
        } elseif($this->subcategory->color) {
            return  ColorProduct::whereHas('product', function(Builder $query){
                        $query->where('id', $this->id);
                    })->sum('quantity');
        }else{

            return $this->quantity;

        }
        
    }

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
        return $this->belongsToMany(Color::class)->withPivot('quantity');
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
