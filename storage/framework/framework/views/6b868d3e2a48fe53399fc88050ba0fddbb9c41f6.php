<div class="flex_show">
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e($error); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <h2>Редактирования товара: <?php echo e($bakery->name ?? ''); ?></h2>
    <form action="<?php echo e(route('bakery.update', ['bakery'=>$bakery->id])); ?>" method="post" class="form" style="width: 40vw">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PATCH')); ?>

        <div class="form-group">
            <label for="exampleFormControlInput1">Название Товара</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo e($bakery->name ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Количество</label>
            <input type="text" name="valume" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo e($bakery->valume ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo e($bakery->link ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория товара</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($bakery->id_category == $category_one->id): ?>
                <option value="<?php echo e($category_one->id); ?>" selected><?php echo e($category_one->name_category); ?></option>
                <?php else: ?>
                <option value="<?php echo e($category_one->id); ?>"><?php echo e($category_one->name_category); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <input name="items" type="submit" class="btn btn-outline-success" value="Сохранить">
    </form>
</div>
<hr style="width: 50%; color: black; height: 2px; background-color: black; border-radius: 5px" />
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\blog\resources\views/edit.blade.php ENDPATH**/ ?>