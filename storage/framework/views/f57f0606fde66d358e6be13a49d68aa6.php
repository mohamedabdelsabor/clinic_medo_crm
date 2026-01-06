

<?php $__env->startSection('title','الأطباء'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold tracking-tight">قائمة الأطباء</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">إدارة بيانات الأطباء</p>
        </div>

        <a href="<?php echo e(route('doctors.create')); ?>"
           class="px-6 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white shadow-lg hover:shadow-sky-500/40 transition">
            ➕ إضافة طبيب
        </a>
    </div>

    <div class="relative overflow-hidden rounded-3xl bg-white/10 dark:bg-white/5 backdrop-blur-xl border border-white/20 shadow-2xl">

        
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -left-24 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl"></div>

        <?php if($doctors->isEmpty()): ?>
            <div class="p-12 text-center text-slate-400">
                لا يوجد أطباء مسجلين حتى الآن
            </div>
        <?php else: ?>
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
                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-white/5 transition">
                    <td class="p-4 font-medium"><?php echo e($doctor->name); ?></td>
                    <td class="p-4"><?php echo e($doctor->specialty); ?></td>
                    <td class="p-4"><?php echo e($doctor->phone ?: '—'); ?></td>
                    <td class="p-4"><?php echo e($doctor->working_days_label); ?></td>
                    <td class="p-4">
                        <?php if($doctor->status): ?>
                            <span class="text-emerald-400">نشط</span>
                        <?php else: ?>
                            <span class="text-rose-400">موقوف</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 flex gap-4">
                        <a href="<?php echo e(route('doctors.edit',$doctor)); ?>" class="text-sky-400 hover:underline">تعديل</a>
                        <form action="<?php echo e(route('doctors.destroy',$doctor)); ?>" method="POST"
                              onsubmit="return confirm('هل أنت متأكد من حذف هذا الطبيب؟')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="text-rose-400 hover:underline">حذف</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\clinic-crm\resources\views/doctors/index.blade.php ENDPATH**/ ?>