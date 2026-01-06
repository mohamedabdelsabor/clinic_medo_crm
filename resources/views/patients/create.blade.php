@extends('layouts.dashboard')

@section('title','إضافة مريض')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold tracking-tight">إضافة مريض جديد</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">إدخال بيانات مريض جديد في النظام</p>
        </div>

        <a href="{{ route('patients.index') }}"
           class="text-slate-500 hover:text-sky-500 dark:text-slate-400 dark:hover:text-sky-400 transition">
            ← رجوع
        </a>
    </div>

    <form action="{{ route('patients.store') }}" method="POST"
          class="relative overflow-hidden rounded-3xl 
          bg-white/70 dark:bg-white/5 
          backdrop-blur-xl 
          border border-slate-200 dark:border-white/10 
          shadow-2xl p-8 space-y-8 transition-all">
        @csrf

        {{-- Glow --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -left-24 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">

            @php
                $input = 'peer w-full rounded-xl px-4 pt-6 pb-2 
                bg-white text-slate-900 placeholder-transparent
                border border-slate-300

                dark:bg-transparent dark:text-white dark:border-white/10

                focus:outline-none focus:ring-2 focus:ring-sky-400 transition';
            @endphp

            @php
                $label = 'absolute right-4 top-2 text-xs 
                text-slate-500 peer-focus:text-sky-500

                dark:text-slate-400 dark:peer-focus:text-sky-400

                transition';
            @endphp

            {{-- الاسم --}}
            <div class="relative">
                <input type="text" name="name" value="{{ old('name') }}" required class="{{ $input }}">
                <label class="{{ $label }}">اسم المريض</label>
            </div>

            {{-- الهاتف --}}
            <div class="relative">
                <input type="text" name="phone" value="{{ old('phone') }}" class="{{ $input }}">
                <label class="{{ $label }}">رقم الهاتف</label>
            </div>

            {{-- النوع --}}
            <div class="relative">
                <select name="gender" class="{{ $input }}">
                    <option value="">— اختر —</option>
                    <option value="male" {{ old('gender')=='male'?'selected':'' }}>ذكر</option>
                    <option value="female" {{ old('gender')=='female'?'selected':'' }}>أنثى</option>
                </select>
                <label class="{{ $label }}">النوع</label>
            </div>

            {{-- تاريخ الميلاد --}}
            <div class="relative">
                <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="{{ $input }}">
                <label class="{{ $label }}">تاريخ الميلاد</label>
            </div>

            {{-- العنوان --}}
            <div class="relative md:col-span-2">
                <input type="text" name="address" value="{{ old('address') }}" class="{{ $input }}">
                <label class="{{ $label }}">العنوان</label>
            </div>

            {{-- ملاحظات --}}
            <div class="relative md:col-span-2">
                <textarea name="notes" rows="3" class="{{ $input }}">{{ old('notes') }}</textarea>
                <label class="{{ $label }}">ملاحظات</label>
            </div>

        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-4 relative z-10">
            <a href="{{ route('patients.index') }}"
               class="px-6 py-2 rounded-full border border-slate-300 text-slate-600 hover:bg-slate-100
               dark:border-white/20 dark:text-slate-300 dark:hover:bg-white/10 transition">
                إلغاء
            </a>

            <button type="submit"
                    class="relative px-8 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold shadow-lg hover:shadow-sky-500/40 transition">
                حفظ المريض
            </button>
        </div>

    </form>

</div>

@endsection
