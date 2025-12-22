<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div class="d-flex align-items-center gap-3">

        <!-- Botão voltar circular -->
        <a
            href="<?= site_url('/') ?>"
            class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
            style="width:40px; height:40px;"
            title="Voltar para a tela inicial">
            <i class="bi bi-arrow-left"></i>
        </a>

        <!-- Título + subtítulo -->
        <div>
            <h1 class="display-6 fw-bold mb-1">Cargos</h1>
            <p class="text-muted mb-0">
                Gerencie os cargos disponíveis na organização
            </p>
        </div>

    </div>

    <!-- Botão ação -->
    <a href="<?= site_url('role/create') ?>" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle me-1"></i> Novo cargo
    </a>

</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th class="text-center" style="width:120px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($roles)): ?>
                        <?php foreach ($roles as $role): ?>
                            <tr>
                                <td><?= $role->name ?></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a
                                            href="<?= site_url('role/edit/' . $role->id) ?>"
                                            class="btn btn-outline-warning"
                                            title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <button
                                            type="button"
                                            class="btn btn-outline-danger btn-delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal"
                                            data-url="<?= site_url('role/delete/' . $role->id) ?>"
                                            data-title="Excluir cargo"
                                            data-message="Deseja excluir <strong><?= $role->name ?></strong>?">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center text-muted py-4">
                                Nenhum cargo cadastrado
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