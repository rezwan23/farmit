<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'from_district_id', 
        'from_thana_id',
        'from_post_office_id',
        'to_district_id', 
        'to_thana_id',
        'to_post_office_id',
        'description',
        'journey_date_and_time'
    ];


    public function fromDistrict()
    {
        return $this->belongsTo(District::class, 'from_district_id', 'district_id');
    }

    public function toDistrict()
    {
        return $this->belongsTo(District::class, 'to_district_id', 'district_id');
    }

    public function fromThana()
    {
        return $this->belongsTo(Thana::class, 'from_thana_id');
    }

    public function toThana()
    {
        return $this->belongsTo(Thana::class, 'to_thana_id');
    }

    public function fromPostOffice()
    {
        return $this->belongsTo(PostOffice::class, 'from_post_office_id');
    }

    public function toPostOffice()
    {
        return $this->belongsTo(PostOffice::class, 'to_post_office_id');
    }
}
