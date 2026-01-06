

<?php $__env->startSection('title','إضافة طبيب'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-5xl mx-auto">

<form action="<?php echo e(route('doctors.store')); ?>" method="POST"
      class="rounded-3xl bg-white/10 backdrop-blur-xl p-8 space-y-8 shadow-2xl">
<?php echo csrf_field(); ?>

<div class="grid md:grid-cols-3 gap-6">

<input name="name" placeholder="اسم الطبيب" class="f-input" required>
<input name="specialty" placeholder="التخصص" class="f-input" required>
<input name="degree" placeholder="الدرجة العلمية" class="f-input">

<input name="phone" placeholder="رقم الهاتف" class="f-input">
<input name="email" placeholder="البريد الإلكتروني" class="f-input">
<input name="room_number" placeholder="رقم الغرفة" class="f-input">

<input name="consultation_fee" placeholder="سعر الكشف" type="number" class="f-input">

<div>
<label class="block text-xs mb-1">أيام العمل</label>
<div class="grid grid-cols-3 gap-2 text-xs">
<?php $__currentLoopData = ['sat'=>'السبت','sun'=>'الأحد','mon'=>'الإثنين','tue'=>'الثلاثاء','wed'=>'الأربعاء','thu'=>'الخميس','fri'=>'الجمعة']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<label class="flex gap-1"><input type="checkbox" name="working_days[]" value="<?php echo e($k); ?>"> <?php echo e($v); ?></label>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

<input type="time" name="start_time" class="f-input">
<input type="time" name="end_time" class="f-input">

<select name="status" class="f-input">
<option value="1">نشط</option>
<option value="0">موقوف</option>
</select>

<textarea name="notes" rows="3" placeholder="ملاحظات" class="f-input md:col-span-3"></textarea>

</div>

<button class="px-8 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white">
حفظ الطبيب
</button>

</form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\clinic-crm\resources\views/doctors/create.blade.php ENDPATH**/ ?>