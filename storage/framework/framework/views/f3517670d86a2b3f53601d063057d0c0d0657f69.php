<div class="flex_show">
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e($error); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <h2>Редактирование категории: <?php echo e($category->name_category); ?></h2>
    <form action="<?php echo e(route('bakery.updateadd', ['id'=>$category->id])); ?>" method="post" class="form" style="width: 40vw">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PATCH')); ?>

        <div class="form-group" >
            <label for="exampleFormControlInput1" >Название Категории</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo e($category->name_category); ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo e($category->link); ?>">
        </div>
        <input name="items" type="submit" class="btn btn-outline-success" value="Сохранить">
    </form>
</div>
<hr style="width: 45%; color: black; height: 2px; background-color: black; border-radius: 5px" />
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\blog\resources\views/editadd.blade.php ENDPATH**/ ?>