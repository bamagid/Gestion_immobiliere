<?php $__env->startSection('content'); ?>
    <div class="row mt-2">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 mt-4 mb-4">
                <div class="card z-index-4" style="height:auto;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent
                                        d-flex justify-content-center align-items-center">
                        <img src="<?php echo e(asset('images/' . $article->image)); ?>"
                            style="width: 100%; height: 350px; object-fit: cover;object-position: center center;"
                            alt="image de l'article">
                    </div>
                    <div class="card-body" style="overflow: hidden;">
                        <h6 class="mb-0 "><?php echo e($article->nom); ?></h6>
                        <style>
                            .ellipsis {
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                max-width: 300px;
                            }
                        </style>
                        <div class="ellipsis">
                            <?php echo e($article->description); ?>

                        </div>
                        <hr>
                        <div class="d-flex">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            <p class="text-sm me-3"> <?php echo e($article->statut); ?> </p>
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <p class="text-sm ellipsis" style=" max-width: 300px; "> <?php echo e($article->localisation); ?> </p>

                        </div>
                        <div class="card-body" style="display:flex;justify-content:space-around;flex-wrap:nowrap;">
                            <div>
                                <a href="/articles/<?php echo e($article->id); ?>" class="btn btn-success me-3">voir plus</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo e($articles->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ladyr\Documents\SIMPLON\TAF\ATELIER\framework\atelier17_trinome\Gestion_immobiliere\Atelier17_Laravel\resources\views/articles/myposts.blade.php ENDPATH**/ ?>