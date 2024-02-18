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

class Project extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'projects';

    public const FEATURED_RADIO = [
        'active' => 'active',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'active'   => 'active',
        'inactive' => 'inactive',
        'banned'   => 'banned',
        'block'    => 'block',
    ];

    protected $appends = [
        'image',
        'images',
        'attachments',
        'video',
        'brochure',
        'plan_image',
        'construction_updates_images',
        'construction_updates_videos',
        'second_image',
        'banners',
    ];

    protected $fillable = [
        'title',
        'active',
        'user_id',
        'status',
        'lat',
        'lang',
        'location_link',
        'description',
        'addresse',
        'city_id',
        'featured',
        'project_type_id',
        'plan_title',
        'second_title',
        'second_description',
        'plan_description',
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

    public function projectRealEstateUnits()
    {
        return $this->hasMany(RealEstateUnit::class, 'project_id', 'id');
    }

    public function projectBookMeetings()
    {
        return $this->hasMany(BookMeeting::class, 'project_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

    public function getVideoAttribute()
    {
        return $this->getMedia('video');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function nearbies()
    {
        return $this->belongsToMany(Near::class);
    }

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    public function getBrochureAttribute()
    {
        return $this->getMedia('brochure')->last();
    }

    public function getPlanImageAttribute()
    {
        $file = $this->getMedia('plan_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getConstructionUpdatesImagesAttribute()
    {
        $files = $this->getMedia('construction_updates_images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getConstructionUpdatesVideosAttribute()
    {
        return $this->getMedia('construction_updates_videos');
    }

    public function getSecondImageAttribute()
    {
        $file = $this->getMedia('second_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBannersAttribute()
    {
        $files = $this->getMedia('banners');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
