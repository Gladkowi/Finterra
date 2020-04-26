<div class="flex_show">
    <h3>Добавить продукт</h3>
    <form action="<?php echo e(route('bakery.store')); ?>" method="post" class="form" style="width: 40vw">
        <?php echo e(csrf_field()); ?>

        <div class="form-group" >
            <label for="exampleFormControlInput1">Название Товара</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Количество</label>
            <input type="text" name="valume" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category_one->id); ?>"><?php echo e($category_one->name_category); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <input name="items" type="submit" class="btn btn-outline-success" value="Добавить Товар">
    </form>
</div> 
<hr style="width: 50%; color: black; height: 2px; background-color: black; border-radius: 5px" />
<div class="flex_show">
    <h3>Добавить категорию</h3>
    <form action="<?php echo e(route('bakery.store')); ?>" method="post" class="form" style="width: 40vw">
        <?php echo e(csrf_field()); ?>

        <div class="form-group" >
            <label for="exampleFormControlInput1">Название Категории</label>
            <input type="text" name="name_category" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <input name="categorys" type="submit" class="btn btn-outline-success" value="Добавить Категорию">
    </form>
</div>


<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\blog\resources\views/create.blade.php ENDPATH**/ ?>