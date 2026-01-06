<!DOCTYPE html>
<html lang="ar" dir="rtl"
      x-data="{ dark: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('dark', val => localStorage.setItem('darkMode', val))"
      :class="dark ? 'dark' : ''">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول - Clinic CRM</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>

<body class="min-h-screen transition-all duration-500
             bg-gradient-to-br from-sky-100 via-blue-100 to-indigo-200
             dark:bg-gradient-to-br dark:from-slate-950 dark:via-slate-900 dark:to-slate-800
             flex items-center justify-center">

<!-- زر تغيير الوضع -->
<div class="absolute top-4 right-4 z-50">
    <button @click="dark = !dark"
            class="text-xl hover:scale-110 transition"
            title="تغيير الوضع">
        <span x-show="!dark">🌙</span>
        <span x-show="dark">☀️</span>
    </button>
</div>

<!-- كارت تسجيل الدخول -->
<div class="bg-white/90 dark:bg-slate-800/90 text-gray-800 dark:text-gray-100
            backdrop-blur rounded-2xl shadow-2xl w-full max-w-md p-8 animate-fade-in transition">

    <div class="text-center mb-6">
        <div class="text-4xl mb-2">🏥</div>
        <h1 class="text-2xl font-bold text-sky-700 dark:text-sky-400">Clinic CRM</h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm">نظام إدارة العيادات</p>
    </div>

    <?php if($errors->any()): ?>
        <div class="bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-300 p-2 rounded mb-3 text-sm">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">البريد الإلكتروني</label>
            <input type="email" name="email" required autofocus
                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-slate-600
                          bg-white dark:bg-slate-700 text-gray-900 dark:text-gray-100
                          focus:ring-2 focus:ring-sky-400 focus:outline-none transition">
        </div>

        <div>
            <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">كلمة المرور</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-slate-600
                          bg-white dark:bg-slate-700 text-gray-900 dark:text-gray-100
                          focus:ring-2 focus:ring-sky-400 focus:outline-none transition">
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                <input type="checkbox" name="remember" class="rounded">
                تذكرني
            </label>

            <a href="<?php echo e(route('password.request')); ?>" class="text-sky-600 dark:text-sky-400 hover:underline transition">
                نسيت كلمة المرور؟
            </a>
        </div>

        <button type="submit"
                class="w-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white py-2 rounded-lg font-semibold hover:opacity-90 transition">
            دخول
        </button>
    </form>

    <div class="text-center text-xs text-gray-400 mt-6">
        © <?php echo e(date('Y')); ?> Clinic CRM — جميع الحقوق محفوظة
    </div>

</div>

</body>
</html>
<?php /**PATH E:\xampp\htdocs\clinic-crm\resources\views/auth/login.blade.php ENDPATH**/ ?>