<!DOCTYPE html>
<html lang="ar" dir="rtl"
      x-data="{ dark: localStorage.getItem('darkMode') === 'true' }"
      x-init="
        document.documentElement.classList.toggle('dark', dark);
        $watch('dark', v => {
            localStorage.setItem('darkMode', v);
            document.documentElement.classList.toggle('dark', v);
        })
      "
      :class="dark ? 'dark' : ''">

<head>
    <meta charset="UTF-8">
    <title>@yield('title','لوحة التحكم')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen transition-colors duration-700
             bg-gradient-to-br from-sky-50 via-indigo-50 to-purple-50
             dark:from-[#020617] dark:via-[#020617] dark:to-[#1e1b4b]
             text-slate-900 dark:text-slate-100 overflow-hidden">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside x-data="{ sidebar: true }"
           :class="sidebar ? 'w-64' : 'w-20'"
           class="relative bg-white/70 dark:bg-white/5 backdrop-blur-xl
                  border-r border-white/40 dark:border-white/10
                  min-h-screen transition-all duration-300 p-4 shadow-xl">

        <div class="flex items-center justify-between mb-8">
            <span class="font-bold text-sky-600 dark:text-sky-400 text-lg tracking-wide" x-show="sidebar">
                🏥 Clinic CRM
            </span>
            <button @click="sidebar = !sidebar" class="text-xl hover:scale-110 transition">☰</button>
        </div>

        <nav class="space-y-2 text-sm">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->routeIs('dashboard') ? 'bg-sky-200/60 dark:bg-white/15 font-semibold' : 'hover:bg-sky-200/50 dark:hover:bg-white/10' }}">
                📊 <span x-show="sidebar">الداشبورد</span>
            </a>

            <a href="{{ route('doctors.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->routeIs('doctors.*') ? 'bg-sky-200/60 dark:bg-white/15 font-semibold' : 'hover:bg-sky-200/50 dark:hover:bg-white/10' }}">
                👨‍⚕️ <span x-show="sidebar">الأطباء</span>
            </a>

            <a href="{{ route('patients.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->routeIs('patients.*') ? 'bg-sky-200/60 dark:bg-white/15 font-semibold' : 'hover:bg-sky-200/50 dark:hover:bg-white/10' }}">
                🧑‍🤝‍🧑 <span x-show="sidebar">المرضى</span>
            </a>

            <a href="{{ route('appointments.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->routeIs('appointments.*') ? 'bg-sky-200/60 dark:bg-white/15 font-semibold' : 'hover:bg-sky-200/50 dark:hover:bg-white/10' }}">
                📅 <span x-show="sidebar">الحجوزات</span>
            </a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-8 overflow-y-auto scroll-smooth">

        <!-- Breadcrumbs -->
        <nav class="text-sm text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-2">
            <a href="{{ route('dashboard') }}" class="hover:text-sky-500 transition">🏠 الرئيسية</a>
            <span>›</span>
            <span class="text-slate-700 dark:text-slate-200">@yield('title','لوحة التحكم')</span>
        </nav>

        <!-- Top bar -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-10 gap-4">
            <h1 class="text-3xl font-bold tracking-tight bg-gradient-to-r from-sky-500 to-indigo-500 bg-clip-text text-transparent">
                @yield('title','لوحة التحكم')
            </h1>

            <div class="flex items-center gap-4 self-end sm:self-auto">
                <button @click="dark = !dark"
                        class="p-2 rounded-full bg-white/70 dark:bg-white/10 backdrop-blur shadow-md hover:scale-110 transition">
                    <span x-show="!dark">🌙</span>
                    <span x-show="dark">☀️</span>
                </button>

                <div class="flex items-center gap-2 bg-white/70 dark:bg-white/10 backdrop-blur px-4 py-1.5 rounded-full shadow-md">
                    <span class="text-sm tracking-wide">👤 {{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>

        @yield('content')

    </main>

</div>

<!-- Toast -->
<div x-data="{ show:false, msg:'', type:'success' }"
     x-show="show"
     x-transition.opacity.duration.300ms
     x-on:toast.window="
        msg = $event.detail.message;
        type = $event.detail.type ?? 'success';
        show = true;
        setTimeout(()=>show=false, 3000);
     "
     class="fixed bottom-6 right-6 z-50">

    <div :class="type === 'success' ? 'bg-emerald-500' : 'bg-rose-500'"
         class="text-white px-5 py-3 rounded-xl shadow-lg backdrop-blur">
        <span x-text="msg"></span>
    </div>
</div>

</body>
</html>
