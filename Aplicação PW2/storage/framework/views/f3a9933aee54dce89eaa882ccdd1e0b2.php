

<?php $__env->startSection('title', 'Contatos'); ?>

<?php $__env->startSection('content'); ?>
<h1>Contatos</h1>

<div class="d-flex mb-3">
    <a href="<?php echo e(route('contatos.create')); ?>" class="btn btn-success me-2">Novo Contato</a>
    <a href="<?php echo e(route('tipo-contatos.index')); ?>" class="btn btn-secondary">Gerenciar Tipos de Contato</a>
</div>

<form method="GET" action="<?php echo e(route('contatos.index')); ?>" class="row g-3 mb-3">
    <div class="col-md-4">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control" placeholder="Buscar por nome, email, telefone...">
    </div>
    <div class="col-md-3">
        <select name="tipo_contato_id" class="form-select">
            <option value="">Todos os tipos</option>
            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tipo->id); ?>" <?php if(request('tipo_contato_id') == $tipo->id): ?> selected <?php endif; ?>><?php echo e($tipo->nome); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary" type="submit">Filtrar</button>
    </div>
</form>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $contatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php if($contato->imagem): ?>
                    <a href="<?php echo e(asset('storage/' . $contato->imagem)); ?>" 
                       target="_blank" 
                       title="Clique para abrir a imagem"
                       style="text-decoration: underline; color: #0d6efd; cursor: pointer;">
                        <?php echo e($contato->nome); ?>

                    </a>
                <?php else: ?>
                    <?php echo e($contato->nome); ?>

                <?php endif; ?>
            </td>
            <td>
                <?php if($contato->telefone): ?>
                <a href="https://wa.me/<?php echo e(preg_replace('/\D/', '', $contato->telefone)); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo e($contato->telefone); ?>

                </a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td>
                <?php if($contato->email): ?>
                <a href="mailto:<?php echo e($contato->email); ?>">
                    <?php echo e($contato->email); ?>

                </a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td><?php echo e($contato->tipoContato->nome); ?></td>
            <td>
                <a href="<?php echo e(route('contatos.edit', $contato)); ?>" class="btn btn-primary btn-sm">Editar</a>
                <form action="<?php echo e(route('contatos.destroy', $contato)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" onclick="return confirm('Confirma exclusão?')" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($contatos->withQueryString()->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luizz\OneDrive\Área de Trabalho\Projetos\catalogo-contatos\resources\views/contatos/index.blade.php ENDPATH**/ ?>