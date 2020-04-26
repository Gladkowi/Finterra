<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

    <script src="./blog/resources/js/app.js" defer></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Продуктовый магазин</title>
    
</head>

<body>
   

    <script src="<?php echo e(asset('j.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js.js')); ?>" defer></script>

    <form class="form-inline my-2 my-lg-0" action="<?php echo e(route('bakery.index')); ?>">
            <input class="form-control mr-sm-2" name="search" placeholder="Поиск" aria-label="Поиск" type="text" wire:model="searchTerm">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="https://image.flaticon.com/icons/svg/483/483356.svg" height="25px"></button>
        </form>
        
</body>

</html>
<?php /**PATH W:\domains\blog\resources\views/welcome.blade.php ENDPATH**/ ?>