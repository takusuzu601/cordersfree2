<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    //一対多
    public function products(){
        return $this->hasMany(Product::class);
    }

    //多対多
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
