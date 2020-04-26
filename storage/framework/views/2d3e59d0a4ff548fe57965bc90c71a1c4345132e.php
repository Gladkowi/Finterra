<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo e(route('bakery.index')); ?>">Тестовое</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Регистрация')); ?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Войти')); ?><span class="sr-only">(current)</span></a>
            </li>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <li class="nav-item active">
                <div class="nav-link">
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="https://image.flaticon.com/icons/svg/1828/1828395.svg" height="20px" title="Выйти"></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?></form>
                </div>
            </li>
            <?php endif; ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('bakery.index')); ?>"><img src="https://www.flaticon.com/premium-icon/icons/svg/2782/2782921.svg" height="25px" title="Сбросить"><span class="sr-only">Сбросить</span></a>
            </li>
        </ul>
        
        <select>
                <option id="priceID" value="val">Сортировать по кол</option>
                <option value="val_desc">Сортировать по кол обратно</option>
                <option value="name">Сортировать по имени</option>
                <option value="name_desc">Сортировать по имени обратно</option>
        </select>
        <span id="productData">1</span>
        <!-- <form class="form-inline my-2 my-lg-0" action="<?php echo e(route('bakery.index')); ?>">
            <select class="custom-select mr-sm-2" name="sort">
                <option value="val">Сортировать по кол</option>
                <option value="val_desc">Сортировать по кол обратно</option>
                <option value="name">Сортировать по имени</option>
                <option value="name_desc">Сортировать по имени обратно</option>
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"></button>
        </form> -->
    </div>
</nav>

<div class="main">

    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <? $buf = 0; ?>
    <?php $__currentLoopData = $bakery[$category_one->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bakery_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($category_one->id == $bakery_one->id_category): ?>
    <? $buf = $category_one->id; ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($buf == $category_one->id): ?>
    <div class="category">
        <div id="take_category">
            <div>
                <?php if(auth()->guard()->check()): ?>
                <a style="margin: 0 10px" href="<?php echo e(route('bakery.showadd', ['id'=>$category_one->id])); ?>"><img src="https://image.flaticon.com/icons/svg/2099/2099058.svg" height="25px"></a>
                <img src="<?php echo e($category_one->link); ?>" height="28px">
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                <img style="margin-left: 15px" src="<?php echo e($category_one->link); ?>" height="28px">
                <?php endif; ?>
            </div>
            <span style="font-size: 20px; margin-left: 30px;"><?php echo e($category_one->name_category); ?></span>
            <img style="margin-right: 20px" id="activ" src="https://image.flaticon.com/icons/svg/748/748063.svg" height="25px">
        </div>
        <div style="display: flex;  flex-direction: column;">
            <div id="show_content">
                <?php $__currentLoopData = $bakery[$category_one->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bakery_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($bakery_one->id_category == $category_one->id): ?>
                <div class="card">
                    <img src="<?php echo e($bakery_one->link); ?>" height="120px" style="margin-bottom: 20px">
                    <div style="display:flex; justify-content: space-between; width: 150px; align-items: flex-end;">
                        <div><?php echo e($bakery_one->name); ?></div>
                        <div style="font-size: 8px">Кол. <?php echo e($bakery_one->valume); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('bakery.show', ['bakery'=>$bakery_one->id])); ?>"><img src="https://image.flaticon.com/icons/svg/2099/2099058.svg" height="20px"></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($bakery[$category_one->id]->links()); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <a style="margin: 15px" href="<?php echo e(route('bakery.create')); ?>"><img id="add" src="https://image.flaticon.com/icons/svg/748/748113.svg" height="30px" title="Добавить товар или категорию"></a>
</div>
<?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('lol')->dom;
} elseif ($_instance->childHasBeenRendered('V3vt9Or')) {
    $componentId = $_instance->getRenderedChildComponentId('V3vt9Or');
    $componentTag = $_instance->getRenderedChildComponentTagName('V3vt9Or');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('V3vt9Or');
} else {
    $response = \Livewire\Livewire::mount('lol');
    $dom = $response->dom;
    $_instance->logRenderedChild('V3vt9Or', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
<?php echo \Livewire\Livewire::scripts(); ?>


<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\blog\resources\views/bakery.blade.php ENDPATH**/ ?>