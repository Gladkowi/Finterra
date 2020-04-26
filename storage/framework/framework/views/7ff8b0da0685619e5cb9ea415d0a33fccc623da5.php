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

    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>

</html>
<?php /**PATH D:\blog\resources\views/welcome.blade.php ENDPATH**/ ?>