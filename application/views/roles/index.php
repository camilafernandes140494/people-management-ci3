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

<!-- Tabela -->
<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th class="text-center" style="width:160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($roles)): ?>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?= $role->name ?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a
                                    href="<?= site_url('role/edit/' . $role->id) ?>"
                                    class="btn btn-sm btn-warning"
                                    title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>


                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger btn-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal"
                                    data-url="<?= site_url('role/delete/' . $role->id) ?>"
                                    data-title="Excluir cargo"
                                    data-message="Deseja realmente excluir o cargo <strong><?= $role->name ?></strong>?">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>
                        </td>

                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="text-center text-muted">
                        Nenhum cargo cadastrado
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('templates/footer'); ?>