<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellPost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_name', 'product_image', 'details', 'sell_price', 'district_id	thana_id', 'post_office_id'];
}
