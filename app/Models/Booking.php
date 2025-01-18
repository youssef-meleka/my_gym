<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'scheduled_class_id',
    ];

    /**
     * Get the user associated with the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the scheduled class associated with the booking.
     */
    public function scheduledClass()
    {
        return $this->belongsTo(ScheduledClass::class, 'scheduled_class_id');
    }
}
