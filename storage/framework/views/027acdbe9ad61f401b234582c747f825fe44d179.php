<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="<?php echo e(route('book.index')); ?>">Livros</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="<?php echo e(route('book.update', $book->id)); ?>" method="POST" enctype="multipart/form-data">
	                	<?php echo e(csrf_field()); ?>

						<div class="form-group">
						  	<label for="title">Titulo</label>
						    <input type="text" class="form-control" name="title" id="title"  value="<?php echo e($book->title); ?>">
						</div>       
						<div class="form-group">
                            <label for="name">Autores</label>
                            <select name="author[]" class="form-control selectpicker" multiple="" data-live-search="true" title="Autores">
                                <?php foreach($authors as $author){ ?>
                                    <option value="<?= $author->id ?>" <?= in_array($author->id, $selected_cat) ? "selected" : NULL ; ?>><?= $author->name ?> <?= $author->surname ?></option>
                                <?php } ?>
                            </select>
                            <p class="help-block">Use Crtl para selecionar.</p>
                        </div>                  
                        <div class="form-group">
						  	<label for="description">Descrição</label>
						    <input type="text" class="form-control" name="description" id="description"value="<?php echo e($book->description); ?>">
						</div>
						<div class="form-group">
                            <img src="/images/book/<?php echo e($book->image); ?>"  width="40px" />
                            <input type="hidden" name="deleteimage" value="<?php echo e($book->image); ?>">
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input name="image" type="file">
                            </div>
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