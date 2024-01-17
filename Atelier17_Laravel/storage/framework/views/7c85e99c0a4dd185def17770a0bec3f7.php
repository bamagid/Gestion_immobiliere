
<?php $__env->startSection('content'); ?>


<?php if(session()->has('text')): ?>
	<p><?php echo e(session('text')); ?></p>
	<?php endif; ?>

	<form url="/form/email/newlogement" method="POST" >
		<?php echo csrf_field(); ?>
		<label for="message" >Message</label>
		
		<p>
			<textarea name="message" id="message" rows="4" placeholder="Message à envoyer ici" ></textarea>
			<?php echo e($errors->first('message', ":message")); ?>

		</p>
		<button type="submit" >Envoyer</button>
	</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ladyr\Documents\SIMPLON\TAF\ATELIER\framework\atelier17_trinome\Gestion_immobiliere\Atelier17_Laravel\resources\views/emails/form_newlogement.blade.php ENDPATH**/ ?>