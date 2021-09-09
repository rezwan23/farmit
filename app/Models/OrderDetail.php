<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'sell_post_id'];

    public function sellPost()
    {
        return $this->belongsTo(SellPost::class);
    }
}
