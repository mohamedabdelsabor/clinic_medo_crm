

<?php $__env->startSection('title','المواعيد'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-2xl font-bold tracking-tight">قائمة المواعيد</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400">إدارة مواعيد العيادة</p>
    </div>

    <a href="<?php echo e(route('appointments.create')); ?>"
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
<?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr class="hover:bg-white/5 transition">
    <td class="p-4"><?php echo e($appointment->date->format('Y-m-d')); ?></td>
    <td class="p-4"><?php echo e($appointment->formatted_time); ?></td>
    <td class="p-4"><?php echo e($appointment->doctor->name); ?></td>
    <td class="p-4"><?php echo e($appointment->patient->name); ?></td>
    <td class="p-4">
        <span class="px-2 py-1 text-xs rounded <?php echo e($appointment->status_color); ?>">
            <?php echo e($appointment->status_label); ?>

        </span>
    </td>
    <td class="p-4 flex gap-3">
        <a href="<?php echo e(route('appointments.edit',$appointment)); ?>" class="text-sky-400 hover:underline">تعديل</a>
        <form action="<?php echo e(route('appointments.destroy',$appointment)); ?>" method="POST"
              onsubmit="return confirm('هل أنت متأكد من حذف هذا الموعد؟')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="text-rose-400 hover:underline">حذف</button>
        </form>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
    <td colspan="6" class="p-8 text-center text-slate-400">لا يوجد مواعيد حتى الآن</td>
</tr>
<?php endif; ?>
</tbody>
</table>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\clinic-crm\resources\views/appointments/index.blade.php ENDPATH**/ ?>