<!DOCTYPE html>
<html>
<head>
    <title>Pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Pessoas</h1>

    <a href="<?= site_url('people/create') ?>" class="btn btn-primary mb-3">
        Nova Pessoa
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person): ?>
                <tr>
                    <td><?= $person->name ?></td>
                    <td><?= $person->email ?></td>
                    <td>
                        <a href="<?= site_url('people/edit/'.$person->id) ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="<?= site_url('people/delete/'.$person->id) ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Deseja excluir?')">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>
