@extends('layouts.dashboard')

@section('title','حجز موعد')

@section('content')

<div class="max-w-4xl mx-auto">

<h2 class="text-2xl font-bold mb-6">حجز موعد جديد</h2>

<form action="{{ route('appointments.store') }}" method="POST"
      class="rounded-3xl bg-white/10 backdrop-blur-xl p-8 space-y-6 shadow-2xl">
@csrf

<div class="grid md:grid-cols-2 gap-6">

<select name="doctor_id" class="f-input" required>
    <option value="">اختر الطبيب</option>
    @foreach($doctors as $doctor)
        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
    @endforeach
</select>

<select name="patient_id" class="f-input" required>
    <option value="">اختر المريض</option>
    @foreach($patients as $patient)
        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
    @endforeach
</select>

<input type="date" name="date" class="f-input" required>
<input type="time" name="time" class="f-input" required>

<textarea name="notes" rows="3" placeholder="ملاحظات" class="f-input md:col-span-2"></textarea>

</div>

<button class="px-8 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white">
حجز الموعد
</button>

</form>
</div>

@endsection
