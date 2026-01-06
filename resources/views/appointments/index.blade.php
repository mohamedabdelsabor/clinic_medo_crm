@extends('layouts.dashboard')

@section('title','المواعيد')

@section('content')

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-2xl font-bold tracking-tight">قائمة المواعيد</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400">إدارة مواعيد العيادة</p>
    </div>

    <a href="{{ route('appointments.create') }}"
       class="px-6 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white shadow-lg hover:shadow-sky-500/40 transition">
        ➕ حجز موعد
    </a>
</div>

<div class="rounded-3xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl overflow-hidden">

<table class="w-full text-sm">
<thead class="bg-white/10 text-slate-300">
<tr>
    <th class="p-4 text-right">التاريخ</th>
    <th class="p-4 text-right">الوقت</th>
    <th class="p-4 text-right">الطبيب</th>
    <th class="p-4 text-right">المريض</th>
    <th class="p-4 text-right">الحالة</th>
    <th class="p-4 text-right">الإجراءات</th>
</tr>
</thead>
<tbody class="divide-y divide-white/10">
@forelse($appointments as $appointment)
<tr class="hover:bg-white/5 transition">
    <td class="p-4">{{ $appointment->date->format('Y-m-d') }}</td>
    <td class="p-4">{{ $appointment->formatted_time }}</td>
    <td class="p-4">{{ $appointment->doctor->name }}</td>
    <td class="p-4">{{ $appointment->patient->name }}</td>
    <td class="p-4">
        <span class="px-2 py-1 text-xs rounded {{ $appointment->status_color }}">
            {{ $appointment->status_label }}
        </span>
    </td>
    <td class="p-4 flex gap-3">
        <a href="{{ route('appointments.edit',$appointment) }}" class="text-sky-400 hover:underline">تعديل</a>
        <form action="{{ route('appointments.destroy',$appointment) }}" method="POST"
              onsubmit="return confirm('هل أنت متأكد من حذف هذا الموعد؟')">
            @csrf
            @method('DELETE')
            <button class="text-rose-400 hover:underline">حذف</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="p-8 text-center text-slate-400">لا يوجد مواعيد حتى الآن</td>
</tr>
@endforelse
</tbody>
</table>

</div>
</div>

@endsection
