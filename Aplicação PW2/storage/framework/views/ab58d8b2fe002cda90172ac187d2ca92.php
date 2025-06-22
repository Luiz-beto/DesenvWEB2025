

<?php $__env->startSection('title', 'Editar Tipo de Contato'); ?>

<?php $__env->startSection('content'); ?>
<h1>Editar Tipo de Contato</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Erro!</strong> Corrija os campos abaixo:<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($erro); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('tipo-contatos.update', $tipo->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Tipo</label>
        <input type="text" name="nome" class="form-control" value="<?php echo e(old('nome', $tipo->nome)); ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="<?php echo e(route('tipo-contatos.index')); ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luizz\OneDrive\Área de Trabalho\Projetos\catalogo-contatos\resources\views/tipo-contatos/edit.blade.php ENDPATH**/ ?>