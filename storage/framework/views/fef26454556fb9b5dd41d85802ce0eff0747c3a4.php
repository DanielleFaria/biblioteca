<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="<?php echo e(route('lending.index')); ?>">Locação</a></li>
                	<li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
	                <form action="<?php echo e(route('lending.save')); ?>" method="POST" enctype="multipart/form-data">
	                	<?php echo e(csrf_field()); ?>			
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="book">Livros</label>
                                <select name="book[]" class="form-control selectpicker" multiple="" data-live-search="true" title="Livros">
                                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($book->id); ?>"><?php echo e($book->title); ?>  </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block">Use Crtl para selecionar.</p>
                            </div>
                        </div>                       
                        <div class= col-md-4> 
                            <button type="submit" class="btn btn-primary">Salvar</button>
                         </div>
						<br />
						
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>