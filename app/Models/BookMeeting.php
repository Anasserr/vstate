<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookMeeting extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'book_meetings';

    public static $searchable = [
        'date',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const MEETING_TYPE_SELECT = [
        'tour'       => 'Request Tour',
        'call_agent' => 'Call Agent',
    ];

    protected $fillable = [
        'date',
        'meeting_type',
        'name',
        'email',
        'phone',
        'message',
        'user_id',
        'unit_id',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit()
    {
        return $this->belongsTo(RealEstateUnit::class, 'unit_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
