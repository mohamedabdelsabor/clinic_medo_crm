<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'gender' => 'nullable|in:male,female',
            'birth_date' => 'nullable|date|before:today',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Patient::create($data);

        return redirect()->route('patients.index')
            ->with('toast', ['message' => 'تم إضافة المريض بنجاح', 'type' => 'success']);
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'gender' => 'nullable|in:male,female',
            'birth_date' => 'nullable|date|before:today',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $patient->update($data);

        return redirect()->route('patients.index')
            ->with('toast', ['message' => 'تم تحديث بيانات المريض', 'type' => 'success']);
    }

    public function destroy(Patient $patient)
    {
        // منع الحذف لو عنده حجوزات
        if ($patient->appointments()->exists()) {
            return back()->with('toast', [
                'message' => 'لا يمكن حذف المريض لوجود حجوزات مرتبطة به',
                'type' => 'error'
            ]);
        }

        $patient->delete();

        return redirect()->route('patients.index')
            ->with('toast', ['message' => 'تم حذف المريض', 'type' => 'success']);
    }
}
