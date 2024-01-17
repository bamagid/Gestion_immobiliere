<?php $__env->startSection('content'); ?>
    <?php if(session('statut')): ?>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="alert alert-success col-lg-4">
                <?php echo e(session('statut')); ?>

            </div>
        </div>
    <?php endif; ?>

    <?php if(session('status')): ?>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="alert alert-success col-lg-4">
                <?php echo e(session('status')); ?>

            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-lg-10 mt-2 mb-4">
                <div class="card z-index-2" style="height:auto;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent d-flex justify-content-center align-items-center">
                        <img src="<?php echo e(asset('images/' . $articles->image)); ?>"
                            style="width: 100%; height: 350px; object-fit: cover;object-position: center center;"
                            alt="image de l'article">
                    </div>

                    <div class="card-body mx-5">
                        <h6 class="mb-0"><?php echo e($articles->nom); ?></h6>
                        <p class="text-sm"><?php echo e($articles->description); ?></p>

                        <hr>

                        <div class="d-flex">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            <p class="text-sm me-3"><?php echo e($articles->statut); ?></p>
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <p class="text-sm"><?php echo e($articles->localisation); ?></p>
                            <p class="text-sm me-3">  Nombre de toilettes: <?php echo e($articles->nombreToilette ?? 'N/A'); ?></p>
                            <p class="text-sm me-3">  Nombre de balcons: <?php echo e($articles->nombreBalcon ?? 'N/A'); ?></p>
                            <p class="text-sm me-3">  Espaces verts: <?php echo e($articles->espaceVert ?? 'N/A'); ?></p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <?php if(Auth::user() && Auth::user()->id === $articles->user_id): ?>
                                <a href="<?php echo e('/article/modifier/' . $articles->id); ?>" class="btn btn-success me-3">Modifier
                                    Info Bien</a>
                                <a href="/articles/deletearticle/<?php echo e($articles->id); ?>" class="btn btn-danger">Supprimer le
                                    Bien</a>
                            <?php endif; ?>

                            <?php if(isset($ok) && isset($commentaire) && $commentaire->user_id === Auth::user()->id): ?>
                                <form action="<?php echo e(url('/articles/commentaireupdate/' . $commentaire->id)); ?>"
                                    class="comment_class" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="article_id" value="<?php echo e($article->id); ?>">
                                    <input type="hidden" name="id" value='<?php echo e($commentaire->id); ?>'>
                                    <input type="text" class="input_comment" name="contenu"
                                        value="<?php echo e($commentaire->contenu); ?>">
                                    <button type="submit" class="card__btn">Modifier</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr style="border: 2px solid black width:90%;" class="mx-5">
                    <h3 style="text-align: center">Chambres</h3>

                    <div class="row d-flex justify-content-center align-items-center mb-5">
                        <?php $__currentLoopData = $articles->chambres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chambre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-10">
                                <div class="card mx-5 my-2">
                                    <div class="card-body d-flex justify-content"
                                        style="max-width: fit-content; overflow: auto;">
                                        <div>
                                            <div class="text mb-2 me-5">
                                                <i class="fa-solid fa-image me-2"></i>
                                                <img src="<?php echo e(asset('chambres/' .$chambre->image)); ?>"
                                                    alt="Image de la chambre" style="max-width: 500px ;">
                                            </div>
                                            <div class="mb-2">
                                                <i class="fa-solid fa-info-circle me-2"></i>
                                                Type de chambre:
                                                <?php echo e($chambre->typeChambre === 'simple' ? 'Chambre sans salle de bain' : 'Chambre avec salle de bain'); ?>

                                            </div>
                                            <div class="text mb-2">
                                                <i class="fa-solid fa-ruler me-2"></i>
                                                Dimension de la chambre: <?php echo e($chambre->dimension ?? 'N/A'); ?> m²
                                            </div>
                                            <div>
                                                <?php if(Auth::user() && Auth::user()->id === $chambre->article->user_id): ?>
                                                    <a href="/chambre/update/<?php echo e($chambre->id); ?>"
                                                        class="btn btn-info me-3"style="font-size: 15px;"><i
                                                            class="fa-solid fa-pen-to-square icon-large"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <hr style="border: 2px solid black  width:90%;" class="mx-10">
                        <h3 style="text-align: center">Commentaires</h3>
                        <div class="row d-flex justify-content-center align-items-center mb-5">
                            <?php $__empty_1 = true; $__currentLoopData = $articles->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-10 ">
                                    <div class="card mx-5 my-2">
                                        <div class="card-body d-flex justify-content"
                                            style="max-width: fit-content; overflow: auto;">
                                            <div>
                                                <div class="text mb-2 me-5"><i class="fa-solid fa-user me-2"></i> <b>
                                                        <?php echo e($comment->user->name); ?> </b></div>
                                                <div class="mb-2"><i class="fa-solid fa-message me-2"></i>
                                                    <?php echo e($comment->contenu); ?></div>
                                                <div class="text mb-2"><i class="fa-solid fa-calendar me-2"></i>
                                                    <?php echo e($comment->created_at); ?></div>
                                            </div>
                                            <div>
                                                <?php if(Auth::user() && Auth::user()->id === $comment->user_id): ?>
                                                    <a href="/articles/commentaire/<?php echo e($comment->id); ?>"
                                                        class="btn btn-info me-3"style="font-size: 15px;"><i
                                                            class="fa-solid fa-pen-to-square icon-large"></i></a>
                                                <?php endif; ?>
                                                <?php if((Auth::user() && Auth::user()->role_id === 2) || (Auth::user() && Auth::user()->id === $comment->user_id)): ?>
                                                    <a href="/articles/deletecommentaire/<?php echo e($comment->id); ?>"
                                                        class="btn btn-danger" style="font-size: 15px; "><i
                                                            class="fa-solid fa-delete-left"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-muted ms-12 mb-5 mt-0">Aucun commentaire pour ce bien immobillier</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ladyr\Documents\SIMPLON\TAF\ATELIER\framework\atelier17_trinome\Gestion_immobiliere\Atelier17_Laravel\resources\views/articles/voirplus.blade.php ENDPATH**/ ?>