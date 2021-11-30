<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // リレーション 1対多
    public function cities(){
        return $this->hasMany(City::class);
    }

    public function orders(){
        return $this->hasMAny(Order::class);
    }
}
