<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
<div class="row d-flex justify-content-center align-items-center">
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
</div>
<?php endif; ?>
<form action="<?php echo e(route('chambres.ajouter')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="container col-md-6 border">
        <h4 class="text-center">
            <?php echo e($ok==='bon' ? "Modification des chambres pour le bien immobilier $bien->nom "   : "Ajout des chambres pour le bien immobilier $bien->nom "); ?>

        </h4><br>
        <?php for($i = 0; $i < $bien->nombreChambre; $i++): ?>
        <div class="row ">
            <div class="input-group input-group-outline">
                <label class="form-label mb-2">Image</label>
                <input name="chambres[<?php echo e($i); ?>][image]" type="file" class="form-control mt-5">
            </div>
            <label class="form-label">Type de chambre </label>
            <div class="input-group input-group-outline my-3">
                <select style="width: 500px;" name="chambres[<?php echo e($i); ?>][statut]" class="pe-2 btn btn-sm btn-outline-primary "
                    aria-label="Default select example">
                    <option selected>Type de chambre</option>
                    <option value="simple">Sans salle de bain</option>
                    <option value="avecSalleDeBain">Avec salle de bain</option>
                </select>
            </div>
            </div>
            <label class="form-label ">Dimension de la chambre</label>
            <div class="input-group input-group-outline my-3">
                <input name="chambres[<?php echo e($i); ?>][dimension]" type="number" class="form-control" placeholder="Dimension de la chambre">
            </div>
            <?php endfor; ?>
            <div class="d-flex justify-content-center align-items-center">
                <input type="hidden" name="article_id" value="<?php echo e($bien->id); ?>">
                <input type="submit" class="btn  btn-primary " style="width: 300px;" value="<?php echo e($ok==='bon' ? 'Modifier' : 'Ajouter'); ?>">
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ladyr\Documents\SIMPLON\TAF\ATELIER\framework\atelier17_trinome\Gestion_immobiliere\Atelier17_Laravel\resources\views/articles/ajouterChambre.blade.php ENDPATH**/ ?>