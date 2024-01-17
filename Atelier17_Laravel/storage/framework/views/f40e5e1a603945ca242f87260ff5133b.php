<?php $__env->startSection('content'); ?>

<div class="row   mt-2" >
  <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-6 mt-4 mb-4 " >
     
      <div class="card z-index-2" style="height:60vh;">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-primary  shadow-primary border-radius-lg py-3 pe-1" >
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0 "><?php echo e($article->nom); ?></h6>
          <p class="text-sm "><?php echo e($article->description); ?></p>
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm"> <?php echo e($article->statut); ?> </p>
          </div>
          <div class="card-body">
            <a href="<?php echo e('/articles/'. $article->id); ?>" class="badge rounded-pill bg-primary">voir plus</a>
            <a href="#" class="badge rounded-pill bg-danger">Commenter</a>
          </div>
        </div>
       
      </div>
     
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ladyr\Documents\SIMPLON\TAF\ATELIER\framework\atelier17_trinome\Gestion_immobiliere\Atelier17_Laravel\resources\views/articles/articles.blade.php ENDPATH**/ ?>