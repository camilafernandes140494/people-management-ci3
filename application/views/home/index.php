<?php $this->load->view('templates/header'); ?>

<h1>Gestão de Pessoas</h1>

<ul>
    <li><a href="<?= site_url('people') ?>">Pessoas</a></li>
        <li><a href="<?= site_url('role') ?>">Cargos</a></li>

</ul>

<form method="get" class="row g-3 mb-4">

    <div class="col-md-4">
        <input
            type="text"
            name="name"
            class="form-control"
            placeholder="Buscar por nome"
            value="<?= $this->input->get('name') ?>"
        >
    </div>

    <div class="col-md-4">
        <input
            type="text"
            name="role"
            class="form-control"
            placeholder="Buscar por cargo"
            value="<?= $this->input->get('role') ?>"
        >
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">
            Filtrar
        </button>
    </div>

    <div class="col-md-2">
        <a href="<?= site_url('/') ?>" class="btn btn-secondary w-100">
            Limpar
        </a>
    </div>

</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cargo Atual</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($people as $person): ?>
            <tr>
                <td><?= $person->name ?></td>
                <td><?= $person->role_name ?? 'Sem cargo' ?></td>
                <td>
                    <a href="<?= site_url('people/edit/'.$person->id) ?>"
                       class="btn btn-sm btn-primary">
                        Editar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->load->view('templates/footer'); ?>
