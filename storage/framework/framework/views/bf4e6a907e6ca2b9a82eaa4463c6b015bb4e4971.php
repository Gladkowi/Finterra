<div>
    <input type="text" wire:model="render">
    <button wire:click="delete">Delete Post</button>
    <?php echo e($post); ?>

    <ul>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <p>
                    <?php echo e($user); ?>

                </p>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div><?php /**PATH W:\domains\blog\resources\views/livewire/counter.blade.php ENDPATH**/ ?>