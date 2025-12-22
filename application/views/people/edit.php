<?php $this->load->view('templates/header'); ?>


<div class="d-flex align-items-center gap-3 mb-4 ">

    <a
        href="<?= site_url('home') ?>"
        class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
        style="width:40px; height:40px;"
        title="Voltar para a tela inicial">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>
        <h1 class="display-6 fw-bold mb-1">Editar Pessoa</h1>
        <p class="text-muted mb-0">
            Atualize os dados pessoais e gerencie os cargos vinculados
        </p>
    </div>

</div>

<div class="row g-4">

    <!-- Dados da pessoa -->
    <div class="col-lg-6">
        <div class="card shadow-sm h-100">

            <div class="card-body">
                <h5 class="card-title mb-3">
                    <i class="bi bi-person-lines-fill me-2"></i>
                    Dados pessoais
                </h5>

                <form action="<?= site_url('people/update/' . $person->id) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control form-control-lg"
                            value="<?= $person->name ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control form-control-lg"
                            value="<?= $person->email ?>"
                            required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Data de nascimento</label>
                            <input
                                type="date"
                                name="birth_date"
                                class="form-control"
                                value="<?= $person->birth_date ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telefone</label>
                            <input
                                id="phone"
                                type="text"
                                name="phone"
                                class="form-control"
                                value="<?= $person->phone ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-save me-1"></i> Salvar
                    </button>

                </form>
            </div>
        </div>
    </div>

    <!-- Vincular cargo -->
    <div class="col-lg-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    <i class="bi bi-briefcase-fill me-2"></i>
                    Vincular novo cargo
                </h5>

                <form method="post" action="<?= site_url('people/assignRole/' . $person->id) ?>">
                    <div class="mb-3">
                        <label class="form-label">Cargo</label>
                        <select name="role_id" class="form-select form-select-lg" required>
                            <option value="">Selecione um cargo</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role->id ?>">
                                    <?= $role->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de início</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-plus-circle me-1"></i> Vincular cargo
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Histórico -->
<div class="mt-5">
    <h4 class="mb-3">
        <i class="bi bi-clock-history me-2"></i>
        Histórico de cargos
    </h4>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Cargo</th>
                    <th>Início</th>
                    <th>Fim</th>
                    <th class="text-center" style="width:120px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($history)): ?>
                    <?php foreach ($history as $item): ?>
                        <tr>
                            <td><?= $item->role_name ?></td>
                            <td>
                                <?= date('d/m/Y', strtotime($item->start_date)) ?>
                            </td>
                            <td><?= $item->end_date ?? 'Atual' ?></td>
                            <td class="text-center">
                                <a
                                    href="<?= site_url('people/editHistory/' . $item->id) ?>"
                                    class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Nenhum histórico encontrado
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>