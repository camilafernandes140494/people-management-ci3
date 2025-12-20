<?php $this->load->view('templates/header'); ?>

<div class="mb-4">
    <h1 class="display-5 fw-bold">Gestão de Pessoas</h1>
    <p class="lead text-muted">Gerencie rapidamente pessoas e cargos na sua organização</p>
</div>

<!-- Links principais -->
<div class="d-flex gap-3 mb-4 flex-wrap">
    <a href="<?= site_url('people') ?>" class="btn btn-lg btn-outline-primary flex-grow-1 d-flex align-items-center justify-content-center">
        <i class="bi bi-people me-2"></i> Pessoas
    </a>
    <a href="<?= site_url('role') ?>" class="btn btn-lg btn-outline-success flex-grow-1 d-flex align-items-center justify-content-center">
        <i class="bi bi-briefcase me-2"></i> Cargos
    </a>
</div>

<!-- Filtro -->
<form method="get" class="row g-3 mb-4">
    <div class="col-md-4">
        <input
            type="text"
            name="name"
            class="form-control form-control-lg"
            placeholder="Buscar por nome"
            value="<?= $this->input->get('name') ?>"
        >
    </div>
    <div class="col-md-4">
        <input
            type="text"
            name="role"
            class="form-control form-control-lg"
            placeholder="Buscar por cargo"
            value="<?= $this->input->get('role') ?>"
        >
    </div>
    <div class="col-md-2 d-grid">
        <button type="submit" class="btn btn-primary btn-lg">
            <i class="bi bi-funnel-fill me-1"></i> Filtrar
        </button>
    </div>
    <div class="col-md-2 d-grid">
        <a href="<?= site_url('/') ?>" class="btn btn-secondary btn-lg">
            <i class="bi bi-x-circle me-1"></i> Limpar
        </a>
    </div>
</form>

<!-- Tabela de pessoas -->
<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th>Cargo Atual</th>
                <th class="text-center" style="width:150px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($people)): ?>
                <?php foreach ($people as $person): ?>
                    <tr>
                        <td><?= $person->name ?></td>
                        <td><?= $person->role_name ?? 'Sem cargo' ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('people/edit/'.$person->id) ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square me-1"></i> Editar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted">Nenhuma pessoa encontrada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('templates/footer'); ?>
