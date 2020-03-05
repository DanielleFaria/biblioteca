<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="<?php echo e(route('book.index')); ?>">Livros</a></li>
                	<li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
	                <form action="<?php echo e(route('book.save')); ?>" method="POST" enctype="multipart/form-data">
	                	<?php echo e(csrf_field()); ?>

						<div class="form-group">
						  	<label for="title">Titulo</label>
						    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo">
						</div>
                        <div class="form-group">
                            <label for="name">Autores</label>
                            <select name="author[]" class="form-control selectpicker" multiple="" data-live-search="true" title="Autores">
                                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($author->id); ?>"><?php echo e($author->name); ?>  <?php echo e($author->surname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <p class="help-block">Use Crtl para selecionar.</p>
                        </div>
                        <div class="control-group input-images">
                            <div class="controls">
                                <input name="image" type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                        </div>
						<br />
						<button type="submit" class="btn btn-primary">Salvar</button>
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>