<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierAssign extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'carrier_id', 'from_district_id', 'from_thana_id', 'from_post_office_id', 'to_district_id', 'to_thana_id',
        'description', 'delivered_to', 'delivered_to_mobile_number', 'journey_date_and_time', 'otp', 'amount', 'to_post_office_id',
    ];
}
