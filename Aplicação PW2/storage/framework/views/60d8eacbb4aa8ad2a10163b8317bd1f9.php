

<?php $__env->startSection('title', 'Tipos de Contato'); ?>

<?php $__env->startSection('content'); ?>
<h1>Tipos de Contato</h1>

<div class="mb-3 d-flex gap-2">
    <a href="<?php echo e(route('tipo-contatos.create')); ?>" class="btn btn-success">Novo Tipo</a>
    <a href="<?php echo e(route('contatos.index')); ?>" class="btn btn-secondary">Voltar para Contatos</a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($tipo->id); ?></td>
            <td><?php echo e($tipo->nome); ?></td>
            <td>
                <a href="<?php echo e(route('tipo-contatos.edit', $tipo)); ?>" class="btn btn-primary btn-sm">Editar</a>

                <form action="<?php echo e(route('tipo-contatos.destroy', $tipo)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" onclick="return confirm('Confirma exclusão?')" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luizz\OneDrive\Área de Trabalho\Projetos\catalogo-contatos\resources\views/tipo-contatos/index.blade.php ENDPATH**/ ?>