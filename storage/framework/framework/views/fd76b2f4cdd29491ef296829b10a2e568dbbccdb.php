<div>
    <form class="form-inline my-2 my-lg-0" action="<?php echo e(route('bakery.index')); ?>" wire:model="search">
        <input class="form-control mr-lg-2" name="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="https://image.flaticon.com/icons/svg/483/483356.svg" height="25px"></button>
    </form>
    <div style="display: flex; flex-direction: column; position: absolute; top: 50px; right: 20px; z-index: 500;">
        <?php if(!empty($posts)): ?>
        <?php $treck = 0; ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($treck < 8): ?>
        <div class="card_smoll" style="margin-bottom: 5px;">
            <div>
                <?php if(auth()->guard()->check()): ?>
                <a style="margin: 0 5px" href="<?php echo e(route('bakery.show', ['bakery'=>$post->id])); ?>"><img src="https://image.flaticon.com/icons/svg/2099/2099058.svg" height="25px"></a>
                <img src="<?php echo e($post->link); ?>" height="19px">
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                <img style="margin-left: 15px" src="<?php echo e($post->link); ?>" height="19px">
                <?php endif; ?>
            </div>
            <span style="font-size: 15px; margin-left: 15px;"><?php echo e($post->name); ?></span>
            <div style="font-size: 8px; margin-right: 20px">Кол. <?php echo e($post->valume); ?></div>
        </div>
        <?php $treck++ ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH D:\blog\resources\views/livewire/counter.blade.php ENDPATH**/ ?>