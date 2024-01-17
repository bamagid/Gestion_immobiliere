<?php $__env->startSection('content'); ?>
    <form action="<?php echo e('/articles/modifierArticle/ ' . $article->id); ?>"method="post" enctype="multipart/form-data">
        
        <?php echo csrf_field(); ?>
        <div class="container col-md-6 border">
            <h4 class="text-center">
                Modifier Informations " <?php echo e($article->nom); ?> "  <br>
            </h4>
            <div class="row ">
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nom</label>
                    <input name="nom" value="<?php echo e($article->nom); ?>"type="text" class="form-control">
                </div>

                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" value="<?php echo e($article->categorie); ?>" name="categorie"
                        class="pe-2 btn btn-sm btn-outline-primary " aria-label="Default select example">
                        
                        <option value="luxe">Luxe</option>
                        <option value="moyen">Moyen</option>
                        <option value="abordable">Abordable</option>
                    </select>
                </div>
                <div class="input-group input-group-outline">
                    <label class="form-label">image</label>
                    <input name="image" value="<?php echo e($article->image); ?>"type="file" class="form-control mt-5">
                </div>
                <div class="input-group input-group-outline my-2">
                    <textarea name="description" type="text" class="form-control" rows="3" placeholder="Description"><?php echo e($article->description); ?></textarea>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Localisation</label>
                    <input name="localisation" value="<?php echo e($article->localisation); ?>" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="statut" class="pe-2 btn btn-sm btn-outline-primary"
                        aria-label="Default select example">
                        <option selected value="<?php echo e($article->statut); ?>"><?php echo e($article->statut); ?></option>

                        <option value="disponible">disponible</option>
                        <option value="occupé">occupé</option>

                    </select>
                </div class="d-flex justify-content-center align-items-center">
                <input type="hidden" value="<?php echo e($article->id); ?>" name="id">
                <button type="submit" class="btn btn-primary ms-7 "style="width: 300px;">Modifier</button>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ladyr\Documents\SIMPLON\TAF\ATELIER\framework\atelier17_trinome\Gestion_immobiliere\Atelier17_Laravel\resources\views/articles/modifierArticles.blade.php ENDPATH**/ ?>