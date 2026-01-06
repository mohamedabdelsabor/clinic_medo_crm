@extends('layouts.dashboard')

@section('title','تعديل موعد')

@section('content')

<div class="max-w-4xl mx-auto">

<h2 class="text-2xl font-bold mb-6">تعديل الموعد</h2>

<form action="{{ route('appointments.update',$appointment) }}" method="POST"
      class="rounded-3xl bg-white/10 backdrop-blur-xl p-8 space-y-6 shadow-2xl">
@csrf
@method('PUT')

<div class="grid md:grid-cols-2 gap-6">

<select name="doctor_id" class="f-input" required>
    @foreach($doctors as $doctor)
        <option value="{{ $doctor->id }}" {{ $appointment->doctor_id==$doctor->id?'selected':'' }}>
            {{ $doctor->name }}
        </option>
    @endforeach
</select>

<select name="patient_id" class="f-input" required>
    @foreach($patients as $patient)
        <option value="{{ $patient->id }}" {{ $appointment->patient_id==$patient->id?'selected':'' }}>
            {{ $patient->name }}
        </option>
    @endforeach
</select>

<input type="date" name="date" value="{{ $appointment->date->format('Y-m-d') }}" class="f-input" required>
<input type="time" name="time" value="{{ $appointment->formatted_time }}" class="f-input" required>

<select name="status" class="f-input">
    @foreach(['pending'=>'قيد الانتظار','confirmed'=>'مؤكد','done'=>'تم','cancelled'=>'ملغي'] as $k=>$v)
        <option value="{{ $k }}" {{ $appointment->status==$k?'selected':'' }}>{{ $v }}</option>
    @endforeach
</select>

<textarea name="notes" rows="3" class="f-input md:col-span-2">{{ $appointment->notes }}</textarea>

</div>

<button class="px-8 py-2 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 text-white">
حفظ التعديلات
</button>

</form>
</div>

@endsection
