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




<!-- Tabela -->
<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo atual</th>
                <th class="text-center" style="width:180px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($people)): ?>
                <?php foreach ($people as $person): ?>
                    <tr>
                        <td><?= $person->name ?></td>
                        <td><?= $person->email ?></td>
                        <td><?= $person->current_role ?? 'Sem cargo' ?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a
                                    href="<?= site_url('people/edit/' . $person->id) ?>"
                                    class="btn btn-sm btn-warning"
                                    title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger btn-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal"
                                    data-url="<?= site_url('people/delete/' . $person->id) ?>"
                                    data-title="Excluir pessoa"
                                    data-message="Tem certeza que deseja excluir <strong><?= $person->name ?></strong>?">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Nenhuma pessoa cadastrada
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>
    <div class="d-flex justify-content-between align-items-center m-2">
        <small class="text-muted">
            Mostrando <?= $start ?>–<?= $end ?> de <?= $total ?> registros
        </small>

        <?= $links ?>
    </div>


</div>



<?php $this->load->view('templates/footer'); ?>