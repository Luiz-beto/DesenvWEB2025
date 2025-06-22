<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $__env->yieldContent('title', 'Minha Agenda'); ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body>

<!-- Navbar principal -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo e(url('/')); ?>">
            <i class="fas fa-address-book fa-2x me-2"></i>
            <span>Minha Agenda</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if(request()->routeIs('contatos.*')): ?> active <?php endif; ?>" href="<?php echo e(route('contatos.index')); ?>">
                        <i class="fas fa-address-book me-1"></i> Contatos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(request()->routeIs('tipo-contatos.*')): ?> active <?php endif; ?>" href="<?php echo e(route('tipo-contatos.index')); ?>">
                        <i class="fas fa-tags me-1"></i> Tipos de Contato
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo principal -->
<div class="container mt-4">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\Users\luizz\OneDrive\Área de Trabalho\Projetos\catalogo-contatos\resources\views/layouts/app.blade.php ENDPATH**/ ?>