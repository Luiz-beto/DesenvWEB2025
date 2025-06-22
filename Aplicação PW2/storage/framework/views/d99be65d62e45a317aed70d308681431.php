

<?php $__env->startSection('content'); ?>
<h2>Editar Contato</h2>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<form action="<?php echo e(route('contatos.update', $contato->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="<?php echo e(old('nome', $contato->nome)); ?>" required>
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo e(old('telefone', $contato->telefone)); ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', $contato->email)); ?>">
    </div>

    <div class="mb-3">
        <label for="tipo_contato_id" class="form-label">Tipo Contato</label>
        <select name="tipo_contato_id" id="tipo_contato_id" class="form-select" required>
            <option value="">Selecione...</option>
            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($tipo->id); ?>" <?php echo e((old('tipo_contato_id', $contato->tipo_contato_id) == $tipo->id) ? 'selected' : ''); ?>>
                <?php echo e($tipo->nome); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="imagem" class="form-label">Imagem Atual</label><br>
        <?php if($contato->imagem): ?>
        <img src="<?php echo e(asset('storage/' . $contato->imagem)); ?>" alt="Imagem do contato" width="120" class="mb-3">
        <?php else: ?>
        <p>Nenhuma imagem cadastrada.</p>
        <?php endif; ?>
        <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">
        <small class="text-muted">Selecione uma nova imagem para substituir</small>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="<?php echo e(route('contatos.index')); ?>" class="btn btn-secondary">Voltar</a>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luizz\OneDrive\Área de Trabalho\Projetos\catalogo-contatos\resources\views/contatos/edit.blade.php ENDPATH**/ ?>