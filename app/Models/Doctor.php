<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'degree',
        'phone',
        'email',
        'room_number',
        'working_days',
        'start_time',
        'end_time',
        'consultation_fee',
        'status',
        'notes'
    ];

    protected $casts = [
        'working_days' => 'array',
        'status' => 'boolean',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    /**
     * العلاقات
     */
    public function appointments()
    {
        return $this->hasMany(App\Models\Appointment::class);
    }

    /**
     * Accessor لطباعة الأيام بشكل مفهوم
     */
    public function getWorkingDaysLabelAttribute()
    {
        if (!$this->working_days) return '—';

        $map = [
            'sat' => 'السبت',
            'sun' => 'الأحد',
            'mon' => 'الإثنين',
            'tue' => 'الثلاثاء',
            'wed' => 'الأربعاء',
            'thu' => 'الخميس',
            'fri' => 'الجمعة',
        ];

        return collect($this->working_days)->map(fn($d) => $map[$d] ?? $d)->join('، ');
    }
}
