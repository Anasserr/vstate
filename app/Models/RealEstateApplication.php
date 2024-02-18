<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstateApplication extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'real_estate_applications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PURPOSE_OF_REQUEST_SELECT = [
        'sale'   => 'Sale',
        'resale' => 'Resale',
        'rent'   => 'Rent',
    ];

    protected $fillable = [
        'addresse',
        'location',
        'max_price',
        'min_price',
        'deliver_year',
        'number_of_rooms',
        'floor',
        'user_name',
        'user_phone',
        'notes',
        'time_of_call',
        'email',
        'user_id',
        'purpose_of_request',
        'min_area',
        'max_area',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function listings_available_for_mortgages()
    {
        return $this->belongsToMany(AvailableForMortgage::class);
    }

    public function payment_methods()
    {
        return $this->belongsToMany(PaymentMethod::class);
    }

    public function types()
    {
        return $this->belongsToMany(RealEstateType::class);
    }

    public function views()
    {
        return $this->belongsToMany(View::class);
    }

    public function finish_types()
    {
        return $this->belongsToMany(FinishType::class);
    }
}
