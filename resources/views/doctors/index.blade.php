@extends('layouts.dashboard')

@section('title','الأطباء')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold tracking-tight">قائمة الأطباء</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">إدارة بيانات الأطباء</p>
        </div>

        <a href="{{ route('doctors.create') }}"
           class="px-6 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white shadow-lg hover:shadow-sky-500/40 transition">
            ➕ إضافة طبيب
        </a>
    </div>

    <div class="relative overflow-hidden rounded-3xl bg-white/10 dark:bg-white/5 backdrop-blur-xl border border-white/20 shadow-2xl">

        {{-- Glow --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -left-24 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl"></div>

        @if($doctors->isEmpty())
            <div class="p-12 text-center text-slate-400">
                لا يوجد أطباء مسجلين حتى الآن
            </div>
        @else
        <div class="relative z-10 overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-white/10 text-slate-300">
                <tr>
                    <th class="p-4 text-right">الاسم</th>
                    <th class="p-4 text-right">التخصص</th>
                    <th class="p-4 text-right">الهاتف</th>
                    <th class="p-4 text-right">أيام العمل</th>
                    <th class="p-4 text-right">الحالة</th>
                    <th class="p-4 text-right">الإجراءات</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                @foreach($doctors as $doctor)
                <tr class="hover:bg-white/5 transition">
                    <td class="p-4 font-medium">{{ $doctor->name }}</td>
                    <td class="p-4">{{ $doctor->specialty }}</td>
                    <td class="p-4">{{ $doctor->phone ?: '—' }}</td>
                    <td class="p-4">{{ $doctor->working_days_label }}</td>
                    <td class="p-4">
                        @if($doctor->status)
                            <span class="text-emerald-400">نشط</span>
                        @else
                            <span class="text-rose-400">موقوف</span>
                        @endif
                    </td>
                    <td class="p-4 flex gap-4">
                        <a href="{{ route('doctors.edit',$doctor) }}" class="text-sky-400 hover:underline">تعديل</a>
                        <form action="{{ route('doctors.destroy',$doctor) }}" method="POST"
                              onsubmit="return confirm('هل أنت متأكد من حذف هذا الطبيب؟')">
                            @csrf
                            @method('DELETE')
                            <button class="text-rose-400 hover:underline">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>

</div>

@endsection
