<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with(['doctor','patient'])
            ->orderBy('date')
            ->orderBy('time')
            ->get();

        $doctors = Doctor::where('status', true)->orderBy('name')->get();
        $patients = Patient::orderBy('name')->get();

        return view('appointments.index', compact(
            'appointments',
            'doctors',
            'patients'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointments.create', [
            'doctors' => Doctor::where('status', true)->orderBy('name')->get(),
            'patients' => Patient::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'notes' => 'nullable|string',
        ]);

        // منع تعارض موعد الطبيب
        $existsDoctor = Appointment::where('doctor_id', $data['doctor_id'])
            ->where('date', $data['date'])
            ->where('time', $data['time'])
            ->exists();

        if ($existsDoctor) {
            return back()
                ->withErrors(['time' => 'هذا الموعد محجوز بالفعل لهذا الطبيب'])
                ->withInput();
        }

        // منع تعارض موعد المريض
        $existsPatient = Appointment::where('patient_id', $data['patient_id'])
            ->where('date', $data['date'])
            ->where('time', $data['time'])
            ->exists();

        if ($existsPatient) {
            return back()
                ->withErrors(['time' => 'هذا المريض لديه موعد بالفعل في هذا التوقيت'])
                ->withInput();
        }

        Appointment::create($data);

        return redirect()->route('appointments.index')
            ->with('toast', ['message' => 'تم حجز الموعد بنجاح', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', [
            'appointment' => $appointment,
            'doctors' => Doctor::where('status', true)->orderBy('name')->get(),
            'patients' => Patient::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:pending,confirmed,cancelled,done',
            'notes' => 'nullable|string',
        ]);

        // منع تعارض موعد الطبيب عند التعديل
        $existsDoctor = Appointment::where('doctor_id', $data['doctor_id'])
            ->where('date', $data['date'])
            ->where('time', $data['time'])
            ->where('id', '!=', $appointment->id)
            ->exists();

        if ($existsDoctor) {
            return back()
                ->withErrors(['time' => 'هذا الموعد محجوز بالفعل لهذا الطبيب'])
                ->withInput();
        }

        // منع تعارض موعد المريض عند التعديل
        $existsPatient = Appointment::where('patient_id', $data['patient_id'])
            ->where('date', $data['date'])
            ->where('time', $data['time'])
            ->where('id', '!=', $appointment->id)
            ->exists();

        if ($existsPatient) {
            return back()
                ->withErrors(['time' => 'هذا المريض لديه موعد بالفعل في هذا التوقيت'])
                ->withInput();
        }

        $appointment->update($data);

        return redirect()->route('appointments.index')
            ->with('toast', ['message' => 'تم تحديث الموعد بنجاح', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')
            ->with('toast', ['message' => 'تم حذف الموعد بنجاح', 'type' => 'success']);
    }
}
