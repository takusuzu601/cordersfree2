<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    // ホワイトリスト
    protected $fillable = ['name','city_id'];

    public function orders()
    {
        return $this->hasMAny(Order::class);
    }
}
