<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $name
 * @property string|null $national_id
 * @property string|null $gender
 * @property \Carbon\Carbon|null $birth_date
 * @property string|null $marital_status
 * @property string|null $phone
 * @property string|null $phone_alt
 * @property string|null $email
 * @property string|null $address
 * @property string|null $blood_type
 * @property string|null $allergies
 * @property string|null $chronic_diseases
 * @property string|null $medical_notes
 * @property string|null $file_number
 * @property bool $has_insurance
 * @property string|null $insurance_provider
 * @property \Carbon\Carbon|null $first_visit_at
 * @property bool $status
 *
 * @property-read string|null $age_formatted
 * @property-read string $gender_label
 * @property-read string $status_label
 * @property-read string $insurance_label
 */
class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        // Personal
        'name',
        'national_id',
        'gender',
        'birth_date',
        'marital_status',

        // Contact
        'phone',
        'phone_alt',
        'email',
        'address',

        // Medical
        'blood_type',
        'allergies',
        'chronic_diseases',
        'medical_notes',

        // Administrative
        'file_number',
        'has_insurance',
        'insurance_provider',
        'first_visit_at',
        'status',
    ];

    protected $casts = [
        'birth_date'      => 'date',
        'first_visit_at' => 'date',
        'has_insurance'  => 'boolean',
        'status'         => 'boolean',
    ];

    /* ================= Relations ================= */

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /* ================= Accessors ================= */

    public function getAgeFormattedAttribute(): ?string
{
    if (! $this->birth_date) {
        return null;
    }

    $diff = $this->birth_date->diff(now());

    $years = $diff->y;
    $months = $diff->m;

    // دالة مساعدة لتصريف الكلمات
    $format = function (int $number, string $one, string $two, string $few, string $many) {
        if ($number === 1) return $one;
        if ($number === 2) return $two;
        if ($number >= 3 && $number <= 10) return $number . ' ' . $few;
        return $number . ' ' . $many;
    };

    if ($years === 0) {
        return $format($months, 'شهر', 'شهران', 'شهور', 'شهر');
    }

    if ($years < 2) {
        return $format($years, 'سنة', 'سنتان', 'سنوات', 'سنة')
            . ' و ' .
            $format($months, 'شهر', 'شهران', 'شهور', 'شهر');
    }

    return $format($years, 'سنة', 'سنتان', 'سنوات', 'سنة');
}


    public function getGenderLabelAttribute(): string
    {
        return match ($this->gender) {
            'male'   => 'ذكر',
            'female' => 'أنثى',
            default  => '—',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return $this->status ? 'نشط' : 'موقوف';
    }

    public function getInsuranceLabelAttribute(): string
    {
        return $this->has_insurance ? 'يوجد' : 'لا يوجد';
    }

    /* ================= Scopes ================= */

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
