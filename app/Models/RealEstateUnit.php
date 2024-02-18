<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RealEstateUnit extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'real_estate_units';

    public const PREMIUM_RADIO = [
        'yes' => 'yes',
    ];

    public const FEATURED_RADIO = [
        'yes' => 'yes',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'image',
        'images',
        'plans',
        'image_360',
        'images_360',
    ];

    public const STATUS_SELECT = [
        'active'    => 'active',
        'inactive'  => 'inactive',
        'block'     => 'block',
        'published' => 'published',
    ];

    protected $fillable = [
        'title',
        'description',
        'status',
        'price',
        'project_id',
        'user_id',
        'featured',
        'premium',
        'location_link',
        'lat',
        'lang',
        'number_of_room',
        'number_of_floor',
        'number_of_bath_room',
        'number_of_master_room',
        'notes',
        'has_garage',
        'number_of_garage',
        'features',
        'address',
        'bua',
        'ror',
        'roi',
        'city_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function unitBookMeetings()
    {
        return $this->hasMany(BookMeeting::class, 'unit_id', 'id');
    }

    public function unitLikes()
    {
        return $this->hasMany(Like::class, 'unit_id', 'id');
    }

    public function unitUnitComments()
    {
        return $this->hasMany(UnitComment::class, 'unit_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getPlansAttribute()
    {
        return $this->getMedia('plans');
    }

    public function getImage360Attribute()
    {
        $file = $this->getMedia('image_360')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImages360Attribute()
    {
        return $this->getMedia('images_360');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }

    public function nears()
    {
        return $this->belongsToMany(Near::class);
    }

    public function purposes()
    {
        return $this->belongsToMany(RealstatePurpose::class);
    }

    public function payments()
    {
        return $this->belongsToMany(PaymentMethod::class);
    }

    public function types()
    {
        return $this->belongsToMany(RealEstateType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
