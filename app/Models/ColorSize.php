<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSize extends Model
{
    use HasFactory;

    protected $table="color_size";

    // リレーション 1対多 逆
    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function size(){
        return $this->belongsTo(Size::class);
    }

}
