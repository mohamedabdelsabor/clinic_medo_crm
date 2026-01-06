@extends('layouts.dashboard')

@section('title','لوحة التحكم')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

    {{-- Card --}}
    <div class="group relative overflow-hidden rounded-2xl p-6
                bg-white/80 dark:bg-white/5 backdrop-blur-xl
                border border-white/40 dark:border-white/10
                shadow-lg shadow-slate-200/40 dark:shadow-black/30
                hover:shadow-2xl hover:shadow-sky-500/20
                transition-all duration-500 hover:-translate-y-1 hover:scale-[1.01]">

        <div class="absolute inset-0 bg-gradient-to-tr from-sky-400/15 to-purple-400/15 opacity-0 group-hover:opacity-100 transition duration-500"></div>

        <div class="relative z-10">
            <div class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">
                عدد الأطباء
            </div>
            <div class="text-4xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
                12
            </div>
        </div>
    </div>

    {{-- Card --}}
    <div class="group relative overflow-hidden rounded-2xl p-6
                bg-white/80 dark:bg-white/5 backdrop-blur-xl
                border border-white/40 dark:border-white/10
                shadow-lg shadow-slate-200/40 dark:shadow-black/30
                hover:shadow-2xl hover:shadow-emerald-500/20
                transition-all duration-500 hover:-translate-y-1 hover:scale-[1.01]">

        <div class="absolute inset-0 bg-gradient-to-tr from-emerald-400/15 to-teal-400/15 opacity-0 group-hover:opacity-100 transition duration-500"></div>

        <div class="relative z-10">
            <div class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">
                عدد المرضى
            </div>
            <div class="text-4xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
                320
            </div>
        </div>
    </div>

    {{-- Card --}}
    <div class="group relative overflow-hidden rounded-2xl p-6
                bg-white/80 dark:bg-white/5 backdrop-blur-xl
                border border-white/40 dark:border-white/10
                shadow-lg shadow-slate-200/40 dark:shadow-black/30
                hover:shadow-2xl hover:shadow-orange-500/20
                transition-all duration-500 hover:-translate-y-1 hover:scale-[1.01]">

        <div class="absolute inset-0 bg-gradient-to-tr from-orange-400/15 to-amber-400/15 opacity-0 group-hover:opacity-100 transition duration-500"></div>

        <div class="relative z-10">
            <div class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">
                حجوزات اليوم
            </div>
            <div class="text-4xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
                18
            </div>
        </div>
    </div>

    {{-- Card --}}
    <div class="group relative overflow-hidden rounded-2xl p-6
                bg-white/80 dark:bg-white/5 backdrop-blur-xl
                border border-white/40 dark:border-white/10
                shadow-lg shadow-slate-200/40 dark:shadow-black/30
                hover:shadow-2xl hover:shadow-fuchsia-500/20
                transition-all duration-500 hover:-translate-y-1 hover:scale-[1.01]">

        <div class="absolute inset-0 bg-gradient-to-tr from-fuchsia-400/15 to-pink-400/15 opacity-0 group-hover:opacity-100 transition duration-500"></div>

        <div class="relative z-10">
            <div class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">
                إجمالي الإيراد
            </div>
            <div class="text-4xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
                14,500 ج
            </div>
        </div>
    </div>

</div>

@endsection
