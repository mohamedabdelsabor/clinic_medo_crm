<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'room_number' => 'nullable|string|max:50',
            'working_days' => 'nullable|array',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'consultation_fee' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        Doctor::create($data);

        return redirect()->route('doctors.index')
            ->with('toast', ['message' => 'تم إضافة الطبيب بنجاح', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'room_number' => 'nullable|string|max:50',
            'working_days' => 'nullable|array',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'consultation_fee' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $doctor->update($data);

        return redirect()->route('doctors.index')
            ->with('toast', ['message' => 'تم تحديث بيانات الطبيب', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')
            ->with('toast', ['message' => 'تم حذف الطبيب', 'type' => 'success']);
    }
}
