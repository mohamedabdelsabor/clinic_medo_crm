

<?php $__env->startSection('title','حجز موعد'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl mx-auto">

<h2 class="text-2xl font-bold mb-6">حجز موعد جديد</h2>

<form action="<?php echo e(route('appointments.store')); ?>" method="POST"
      class="rounded-3xl bg-white/10 backdrop-blur-xl p-8 space-y-6 shadow-2xl">
<?php echo csrf_field(); ?>

<div class="grid md:grid-cols-2 gap-6">

<select name="doctor_id" class="f-input" required>
    <option value="">اختر الطبيب</option>
    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<select name="patient_id" class="f-input" required>
    <option value="">اختر المريض</option>
    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<input type="date" name="date" class="f-input" required>
<input type="time" name="time" class="f-input" required>

<textarea name="notes" rows="3" placeholder="ملاحظات" class="f-input md:col-span-2"></textarea>

</div>

<button class="px-8 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white">
حجز الموعد
</button>

</form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\clinic-crm\resources\views/appointments/create.blade.php ENDPATH**/ ?>