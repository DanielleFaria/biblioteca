<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="<?php echo e(route('author.index')); ?>">Autores</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="<?php echo e(route('author.update', $author->id)); ?>" method="POST" enctype="multipart/form-data">
	                	<?php echo e(csrf_field()); ?>

						<div class="form-group">
						  	<label for="name">Nome</label>
						    <input type="text" class="form-control" name="name" id="name"  value="<?php echo e($author->name); ?>">
						</div>                         
                        <div class="form-group">
						  	<label for="surname">Nome</label>
						    <input type="text" class="form-control" name="surname" id="surname"value="<?php echo e($author->surname); ?>">
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