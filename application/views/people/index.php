<div class="container mt-4">
    <h1>Pessoas</h1>

    <a href="<?= site_url('people/create') ?>" class="btn btn-primary mb-3">
        Nova Pessoa
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo Atual</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person): ?>
                <tr>
                    <td><?= $person->name ?></td>
                    <td><?= $person->email ?></td>
                    <td><?= $person->current_role ?></td>
                    <td>
                        <a href="<?= site_url('people/edit/'.$person->id) ?>"
                           class="btn btn-sm btn-warning">
                           Editar
                        </a>
                           <a href="<?= site_url('people/delete/'.$person->id) ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Deseja excluir?')">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
