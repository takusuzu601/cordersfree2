<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    // ホワイトリスト
    protected $fillable=['name','cost','department_id'];

    // リレーション 1対多
    public function districts(){
        return $this->hasMany(District::class);
    }

    public function orders(){
        return $this->hasMAny(Order::class);
    }
}
