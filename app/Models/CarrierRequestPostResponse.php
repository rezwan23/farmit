<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierRequestPostResponse extends Model
{
    use HasFactory;

    protected $fillable = ['carrier_request_post_id', 'responsed_by'];
}
