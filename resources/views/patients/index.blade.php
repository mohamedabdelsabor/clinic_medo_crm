@extends('layouts.dashboard')

@section('title','المرضى')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold tracking-tight">قائمة المرضى</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">إدارة بيانات المرضى المسجلين</p>
        </div>

        <a href="{{ route('patients.create') }}"
           class="px-6 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white shadow-lg hover:shadow-sky-500/40 transition">
            ➕ إضافة مريض
        </a>
    </div>

    <div class="relative overflow-hidden rounded-3xl 
        bg-white/70 dark:bg-white/5 
        backdrop-blur-xl 
        border border-slate-200 dark:border-white/10 
        shadow-2xl">

        {{-- Glow --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -left-24 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl"></div>

        @if($patients->isEmpty())
            <div class="p-12 text-center text-slate-400 dark:text-slate-500">
                لا يوجد مرضى مسجلين حتى الآن
            </div>
        @else
        <div class="relative z-10 overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="
                    bg-slate-100 text-slate-700
                    dark:bg-white/10 dark:text-slate-200
                    font-semibold">
                <tr>
                    <th class="p-4 text-right">الاسم</th>
                    <th class="p-4 text-right">الهاتف</th>
                    <th class="p-4 text-right">النوع</th>
                    <th class="p-4 text-right">العمر</th>
                    <th class="p-4 text-right">الإجراءات</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-slate-200 dark:divide-white/10">
                @foreach($patients as $patient)
                <tr class="
                    hover:bg-slate-100/70 
                    dark:hover:bg-white/5 
                    transition">
                    <td class="p-4 font-medium text-slate-800 dark:text-slate-100">
                        {{ $patient->name }}
                    </td>
                    <td class="p-4 text-slate-600 dark:text-slate-400">
                        {{ $patient->phone ?: '—' }}
                    </td>
                    <td class="p-4">
                        @if($patient->gender === 'male')
                            <span class="px-2 py-0.5 text-xs rounded-full 
                                bg-sky-100 text-sky-700 
                                dark:bg-sky-500/20 dark:text-sky-300">
                                ذكر
                            </span>
                        @elseif($patient->gender === 'female')
                            <span class="px-2 py-0.5 text-xs rounded-full 
                                bg-pink-100 text-pink-700 
                                dark:bg-pink-500/20 dark:text-pink-300">
                                أنثى
                            </span>
                        @else
                            —
                        @endif
                    </td>
                    <td class="p-4 text-slate-700 dark:text-slate-300">
                        {{ $patient->age_formatted ?? '—' }}
                    </td>
                    <td class="p-4 text-right flex gap-4">
                        <a href="{{ route('patients.edit',$patient) }}" 
                           class="text-sky-600 hover:text-sky-800 dark:text-sky-400 dark:hover:text-sky-300 transition">
                            تعديل
                        </a>

                        <form action="{{ route('patients.destroy',$patient) }}" method="POST"
                              onsubmit="return confirm('هل أنت متأكد من حذف هذا المريض؟')">
                            @csrf
                            @method('DELETE')
                            <button class="text-rose-600 hover:text-rose-800 dark:text-rose-400 dark:hover:text-rose-300 transition">
                                حذف
                            </button>
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
