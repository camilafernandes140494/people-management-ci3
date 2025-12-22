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
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form method="get" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Nome</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Ex: Camila"
                    value="<?= $this->input->get('name') ?>">
            </div>

            <div class="col-md-4">
                <label class="form-label">Cargo</label>
                <input
                    type="text"
                    name="role"
                    class="form-control"
                    placeholder="Ex: Desenvolvedor"
                    value="<?= $this->input->get('role') ?>">
            </div>

            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-funnel-fill me-1"></i> Filtrar
                </button>
                <a href="<?= site_url('/') ?>" class="btn btn-outline-secondary w-100">
                    Limpar
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Tabela de pessoas -->
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Cargo atual</th>
                        <th class="text-center" style="width:120px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($people)): ?>
                        <?php foreach ($people as $person): ?>
                            <tr>
                                <td><?= $person->name ?></td>
                                <td><?= $person->role_name ?? 'Sem cargo' ?></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a
                                            href="<?= site_url('people/edit/' . $person->id) ?>"
                                            class="btn btn-outline-warning"
                                            title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Nenhuma pessoa encontrada
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
            <small class="text-muted">
                Mostrando <?= $start ?>–<?= $end ?> de <?= $total ?> registros
            </small>

            <?= $links ?>
        </div>

    </div>
</div>

<?php $this->load->view('templates/footer'); ?>