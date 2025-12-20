<h1>Cargos</h1>

<a href="<?= site_url('role/create') ?>" class="btn btn-primary mb-3">
    Novo Cargo
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $role->name ?></td>
                <td>
                    <a href="<?= site_url('role/edit/'.$role->id) ?>" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <a href="<?= site_url('role/delete/'.$role->id) ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this role?')">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
