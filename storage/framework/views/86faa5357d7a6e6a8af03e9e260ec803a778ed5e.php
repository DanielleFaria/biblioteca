<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li class="active">Locações</li>
                </ol>
                <div class="panel-body">
                    <form class="form-inline" action="<?php echo e(route('lending.search')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group" style="float: right;">
                            <p><a href="<?php echo e(route('lending.add')); ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Nova Locação</a></p>
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
                                <th>Usuário</th>
                                <th>Data Solicitação</th>              
                                <th>Data para Devolução</th>
                                <th>Data Real Devolvida</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $lendings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lending): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php echo e($lending->id); ?></th> 
                                    <td><?php echo e($lending->user->name); ?> </td>                                                                      
                                    <td><?php echo e($lending->date_start); ?> </td>
                                    <td><?php echo e($lending->date_end); ?> </td>
                                    <td><?php echo e($lending->date_finish); ?> </td>
                                    <td width="155" class="text-center">
                                        <a href="<?php echo e(route('lending.update', $lending->id)); ?>" class="btn btn-default">Confirmar devolução</a>
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