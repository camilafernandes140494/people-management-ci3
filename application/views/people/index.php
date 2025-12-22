<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div class="d-flex align-items-center gap-3">

        <a
            href="<?= site_url('/') ?>"
            class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
            style="width:40px; height:40px;"
            title="Voltar para a tela inicial">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div>
            <h1 class="display-6 fw-bold mb-1">Pessoas</h1>
            <p class="text-muted mb-0">
                Gerencie os cadastros de pessoas da organização
            </p>
        </div>

    </div>

    <a href="<?= site_url('people/create') ?>" class="btn btn-primary btn-lg">
        <i class="bi bi-person-plus me-1"></i> Nova pessoa
    </a>

</div>



<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo atual</th>
                        <th class="text-center" style="width:120px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($people)): ?>
                        <?php foreach ($people as $person): ?>
                            <tr>
                                <td><?= $person->name ?></td>
                                <td class="text-muted"><?= $person->email ?></td>
                                <td>
                                    <?= $person->current_role ?? '<span class="text-muted">Sem cargo</span>' ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a
                                            href="<?= site_url('people/edit/' . $person->id) ?>"
                                            class="btn btn-outline-warning"
                                            title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <button
                                            type="button"
                                            class="btn btn-outline-danger btn-delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal"
                                            data-title="Excluir pessoa"
                                            data-url="<?= site_url('people/delete/' . $person->id) ?>"
                                            data-message="Deseja excluir <strong><?= $person->name ?></strong>?">
                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Nenhuma pessoa cadastrada
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