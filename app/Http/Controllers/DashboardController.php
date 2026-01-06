<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Appointment::where('appointments.status', 'done')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->sum('doctors.consultation_fee');

        return view('dashboard', [
            'doctorsCount'      => Doctor::count(),
            'patientsCount'     => Patient::count(),
            'todayAppointments' => Appointment::whereDate('date', today())->count(),
            'totalRevenue'      => $totalRevenue,
        ]);
    }
}
