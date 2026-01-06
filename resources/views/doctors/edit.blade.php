@extends('layouts.dashboard')

@section('title','تعديل طبيب')

@section('content')

<div class="max-w-5xl mx-auto">

<form action="{{ route('doctors.update',$doctor) }}" method="POST"
      class="rounded-3xl bg-white/10 backdrop-blur-xl p-8 space-y-8 shadow-2xl">
@csrf
@method('PUT')

<div class="grid md:grid-cols-3 gap-6">

<input name="name" value="{{ $doctor->name }}" class="f-input" required>
<input name="specialty" value="{{ $doctor->specialty }}" class="f-input" required>
<input name="degree" value="{{ $doctor->degree }}" class="f-input">

<input name="phone" value="{{ $doctor->phone }}" class="f-input">
<input name="email" value="{{ $doctor->email }}" class="f-input">
<input name="room_number" value="{{ $doctor->room_number }}" class="f-input">

<input name="consultation_fee" value="{{ $doctor->consultation_fee }}" type="number" class="f-input">

<div>
<label class="block text-xs mb-1">أيام العمل</label>
<div class="grid grid-cols-3 gap-2 text-xs">
@foreach(['sat'=>'السبت','sun'=>'الأحد','mon'=>'الإثنين','tue'=>'الثلاثاء','wed'=>'الأربعاء','thu'=>'الخميس','fri'=>'الجمعة'] as $k=>$v)
<label class="flex gap-1">
<input type="checkbox" name="working_days[]" value="{{ $k }}" {{ in_array($k,$doctor->working_days??[])?'checked':'' }}>
{{ $v }}
</label>
@endforeach
</div>
</div>

<input type="time" name="start_time" value="{{ $doctor->start_time?->format('H:i') }}" class="f-input">
<input type="time" name="end_time" value="{{ $doctor->end_time?->format('H:i') }}" class="f-input">

<select name="status" class="f-input">
<option value="1" {{ $doctor->status?'selected':'' }}>نشط</option>
<option value="0" {{ ! $doctor->status?'selected':'' }}>موقوف</option>
</select>

<textarea name="notes" rows="3" class="f-input md:col-span-3">{{ $doctor->notes }}</textarea>

</div>

<button class="px-8 py-2 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 text-white">
حفظ التعديلات
</button>

</form>
</div>

@endsection
