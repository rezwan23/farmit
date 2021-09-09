<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellPost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_name', 'product_image', 'weight', 'type', 'details', 'sell_price', 'district_id', 'thana_id', 'post_office_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class, 'district_id', 'district_id');
    }

    public function post()
    {
        return $this->belongsTo(PostOffice::class, 'district_id', 'district_id');
    }

}
