<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li class="active">Livros</li>
                </ol>
                <div class="panel-body">
                    <form class="form-inline" action="<?php echo e(route('book.search')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group" style="float: right;">
                            <p><a href="<?php echo e(route('book.add')); ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Livro">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </form>
                    <br />
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cod</th>                                
                                <th>Titulo</th>
                                <th>Imagem</th>              
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php echo e($book->id); ?></th>                                   
                                    <td><?php echo e($book->title); ?> </td>
                                    <td class="center">
                                        <img src="/images/book/<?php echo e($book->image); ?>"  width="40px" />
                                    </td>
                                    <td width="155" class="text-center">
                                        <a href="<?php echo e(route('book.edit', $book->id)); ?>" class="btn btn-default">Editar</a>
                                        <a href="<?php echo e(route('book.delete', $book->id)); ?>" class="btn btn-danger">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>