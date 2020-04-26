<?php if(isset($bakery)): ?>
<div class="flex_show">
    <div class="card">
        <img src="<?php echo e($bakery->link); ?>" height="120px" style="margin-bottom: 20px">
        <div style="display:flex; justify-content: space-between; width: 150px; align-items: flex-end;">
            <div><?php echo e($bakery->name); ?></div>
            <div style="font-size: 8px">Кол. <?php echo e($bakery->valume); ?></div>
        </div>
    </div>
    <div style="display: flex;">
        <div style="margin: 10px"><a class="btn btn-outline-primary" href="<?php echo e(route('bakery.index')); ?>">Назад</a></div>
        <div style="margin: 10px"><a class="btn btn-outline-warning" href="<?php echo e(url('/bakery/'.$bakery->id.'/edit')); ?>">редактировать</a></div>
        <form style="display: flex; margin: 10px;" action="<?php echo e(route('bakery.destroy', ['bakery'=>$bakery->id])); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>

            <button class="btn btn-outline-danger" type="submit">Удалить</button>
        </form>
    </div>
</div>
<?php endif; ?>


<?php if(isset($category)): ?>
<div class="flex_show">
    <div id="take_category" style="margin: 30px;">
        <img style="margin-left: 15px" src="<?php echo e($category->link); ?>" height="28px">
        <span style="font-size: 20px; margin-left: 30px; margin-right: 20px"><?php echo e($category->name_category); ?></span>
    </div>
    <div style="display: flex;">
        <div style="margin: 10px"><a class="btn btn-outline-primary" href="<?php echo e(route('bakery.index')); ?>">Назад</a></div>
        <div style="margin: 10px"><a class="btn btn-outline-warning" href="<?php echo e(route('bakery.editadd', ['id'=>$category->id])); ?>">редактировать</a></div>
        <form style="display: flex; margin: 10px" action="<?php echo e(route('bakery.destroyadd', ['id'=>$category->id])); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>

            <button class="btn btn-outline-danger" type="submit">Удалить</button>
        </form>
    </div>
</div>
<?php endif; ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\blog\resources\views/show.blade.php ENDPATH**/ ?>