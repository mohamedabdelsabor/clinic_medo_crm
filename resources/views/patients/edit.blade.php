@extends('layouts.dashboard')

@section('title','تعديل بيانات المريض')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold tracking-tight">تعديل بيانات المريض</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">تحديث معلومات المريض المسجل</p>
        </div>

        <a href="{{ route('patients.index') }}"
           class="text-slate-400 hover:text-sky-400 transition">
            ← رجوع
        </a>
    </div>

    <form action="{{ route('patients.update', $patient) }}" method="POST"
          class="relative overflow-hidden rounded-3xl bg-white/10 dark:bg-white/5 backdrop-blur-xl border border-white/20 dark:border-white/10 shadow-2xl p-8 space-y-8 transition-all">
        @csrf
        @method('PUT')

        {{-- Glow --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -left-24 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">

            {{-- الاسم --}}
            <div class="relative">
                <input type="text" name="name" value="{{ old('name',$patient->name) }}" required
                       class="peer w-full bg-transparent border border-white/30 dark:border-white/10 rounded-xl px-4 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-sky-400 transition">
                <label class="absolute right-4 top-2 text-xs text-slate-300 peer-focus:text-sky-400 transition">
                    اسم المريض
                </label>
            </div>

            {{-- الهاتف --}}
            <div class="relative">
                <input type="text" name="phone" value="{{ old('phone',$patient->phone) }}"
                       class="peer w-full bg-transparent border border-white/30 dark:border-white/10 rounded-xl px-4 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-sky-400 transition">
                <label class="absolute right-4 top-2 text-xs text-slate-300 peer-focus:text-sky-400 transition">
                    رقم الهاتف
                </label>
            </div>

            {{-- النوع --}}
            <div class="relative">
                <select name="gender"
                        class="peer w-full bg-transparent border border-white/30 dark:border-white/10 rounded-xl px-4 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-sky-400 transition">
                    <option value="">— اختر —</option>
                    <option value="male" {{ old('gender',$patient->gender)=='male'?'selected':'' }}>ذكر</option>
                    <option value="female" {{ old('gender',$patient->gender)=='female'?'selected':'' }}>أنثى</option>
                </select>
                <label class="absolute right-4 top-2 text-xs text-slate-300 peer-focus:text-sky-400 transition">
                    النوع
                </label>
            </div>

            {{-- تاريخ الميلاد --}}
            <div class="relative">
                <input type="date" name="birth_date"
                       value="{{ old('birth_date', optional($patient->birth_date)->format('Y-m-d')) }}"
                       class="peer w-full bg-transparent border border-white/30 dark:border-white/10 rounded-xl px-4 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-sky-400 transition">
                <label class="absolute right-4 top-2 text-xs text-slate-300 peer-focus:text-sky-400 transition">
                    تاريخ الميلاد
                </label>
            </div>

            {{-- العنوان --}}
            <div class="relative md:col-span-2">
                <input type="text" name="address" value="{{ old('address',$patient->address) }}"
                       class="peer w-full bg-transparent border border-white/30 dark:border-white/10 rounded-xl px-4 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-sky-400 transition">
                <label class="absolute right-4 top-2 text-xs text-slate-300 peer-focus:text-sky-400 transition">
                    العنوان
                </label>
            </div>

            {{-- ملاحظات --}}
            <div class="relative md:col-span-2">
                <textarea name="notes" rows="3"
                          class="peer w-full bg-transparent border border-white/30 dark:border-white/10 rounded-xl px-4 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-sky-400 transition">{{ old('notes',$patient->notes) }}</textarea>
                <label class="absolute right-4 top-2 text-xs text-slate-300 peer-focus:text-sky-400 transition">
                    ملاحظات
                </label>
            </div>

        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-4 relative z-10">
            <a href="{{ route('patients.index') }}"
               class="px-6 py-2 rounded-full border border-white/30 text-slate-300 hover:bg-white/10 transition">
                إلغاء
            </a>

            <button type="submit"
                    class="relative px-8 py-2 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 text-white font-semibold shadow-lg hover:shadow-orange-500/40 transition">
                حفظ التعديلات
            </button>
        </div>

    </form>

</div>

@endsection
