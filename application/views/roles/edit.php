<?php $this->load->view('templates/header'); ?>


<div class="d-flex align-items-center gap-3 mb-4 ">

    <a
        href="<?= site_url('role') ?>"
        class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
        style="width:40px; height:40px;"
        title="Voltar para a tela inicial">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>
        <h1 class="display-6 fw-bold">Editar Cargo</h1>
        <p class="text-muted">Atualize o nome do cargo e gerencie vínculos</p>
    </div>

</div>

<div class="row g-4">

    <div class="col-lg-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">

                <h5 class="card-title mb-4">
                    <i class="bi bi-briefcase-fill me-2"></i>
                    Dados do cargo
                </h5>

                <form action="<?= site_url('role/update/' . $role->id) ?>" method="post">

                    <div class="mb-4">
                        <label class="form-label">Nome do cargo</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control form-control-lg"
                            value="<?= $role->name ?>"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-save me-1"></i> Salvar
                    </button>


                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">

                <h5 class="card-title mb-4">
                    <i class="bi bi-person-plus-fill me-2"></i>
                    Vincular pessoa ao cargo
                </h5>

                <form method="post" action="<?= site_url('role/assignPerson/' . $role->id) ?>">

                    <div class="mb-3">
                        <label class="form-label">Pessoa</label>
                        <select name="person_id" class="form-select form-select-lg" required>
                            <option value="">Selecione uma pessoa</option>
                            <?php foreach ($people as $person): ?>
                                <option value="<?= $person->id ?>">
                                    <?= $person->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Data de início</label>
                        <input type="date" name="start_date" class="form-control form-control-lg" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-link-45deg me-1"></i> Vincular pessoa
                    </button>

                </form>

            </div>
        </div>
    </div>

</div>

<div class="mt-5">
    <h4 class="mb-3">
        <i class="bi bi-people-fill me-2"></i>
        Pessoas atualmente neste cargo
    </h4>

    <?php if (empty($activePeople)): ?>
        <p class="text-muted">Nenhuma pessoa vinculada a este cargo.</p>
    <?php else: ?>
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Data de início</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activePeople as $person): ?>
                        <tr>
                            <td><?= $person->name ?></td>
                            <td>
                                <?= date('d/m/Y', strtotime($person->start_date)) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php $this->load->view('templates/footer'); ?>