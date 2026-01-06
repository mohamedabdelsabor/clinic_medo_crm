<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'date',
        'time',
        'status',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',
    ];

    /* ================= Relations ================= */

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /* ================= Accessors ================= */

    public function getFormattedTimeAttribute(): ?string
    {
        return $this->time
            ? Carbon::parse($this->time)->format('H:i')
            : null;
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'قيد الانتظار',
            'confirmed' => 'مؤكد',
            'cancelled' => 'ملغي',
            'done'      => 'تم',
            default     => '—',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'bg-yellow-500 text-white',
            'confirmed' => 'bg-blue-500 text-white',
            'done'      => 'bg-emerald-500 text-white',
            'cancelled' => 'bg-rose-500 text-white',
            default     => 'bg-slate-500 text-white',
        };
    }

    /* ================= Scopes ================= */

    public function scopeToday($query)
    {
        return $query->whereDate('date', today());
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', today());
    }
}
