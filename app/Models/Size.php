<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable=['name','product_id'];

    //リレーション　一対多　逆
    public function product(){
        return $this->belongsTo(Product::class);
    }
    //リレーション多対多
    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }
}
