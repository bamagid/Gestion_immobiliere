<?php $__env->startSection('content'); ?>
    <div class="container m-4">
        <div class="row d-flex justify-content-center align-items-center">
          <div>
            <h1 class="ms-10">
                Bienvenue sur JYM Immo
            </h1>
        </div>
            <div>
              <img src="<?php echo e(asset('jym_immob-removebg.png')); ?>" alt="Image de JYM Immo" width="1000px">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Documents\dockerlaravel\Gestion_immobiliere\resources\views/welcome.blade.php ENDPATH**/ ?>