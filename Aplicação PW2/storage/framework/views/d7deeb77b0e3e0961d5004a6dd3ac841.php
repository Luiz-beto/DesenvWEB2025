

<?php $__env->startSection('title', 'Novo Tipo de Contato'); ?>

<?php $__env->startSection('content'); ?>
<h1>Criar Tipo de Contato</h1>

<form action="<?php echo e(route('tipo-contatos.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo e(old('nome')); ?>" required>
        <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="<?php echo e(route('tipo-contatos.index')); ?>" class="btn btn-secondary">Voltar</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luizz\OneDrive\Área de Trabalho\Projetos\catalogo-contatos\resources\views/tipo-contatos/create.blade.php ENDPATH**/ ?>