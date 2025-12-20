<!DOCTYPE html>
<html>
<head>
    <title>Edit Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Editar Cargo</h1>

    <form action="<?= site_url('role/update/'.$role->id) ?>" method="post">

        <div class="mb-3">
            <label class="form-label">Nome do cargo</label>
            <input type="text" name="name" class="form-control"
                   value="<?= $role->name ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?= site_url('role') ?>" class="btn btn-secondary">Voltar</a>
    </form>
    <hr>
<h4>Vincular pessoa a este cargo</h4>

<form method="post" action="<?= site_url('role/assignPerson/'.$role->id) ?>">

    <div class="mb-3">
        <label class="form-label">Pessoa</label>
        <select name="person_id" class="form-select" required>
            <option value="">Selecione</option>
            <?php foreach ($people as $person): ?>
                <option value="<?= $person->id ?>">
                    <?= $person->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Data de início</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">
        Vincular Pessoa
    </button>
</form>
<hr>

<h4>Pessoas atualmente neste cargo</h4>

<?php if (empty($activePeople)): ?>
    <p class="text-muted">Nenhuma pessoa vinculada a este cargo.</p>
<?php else: ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de início</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activePeople as $person): ?>
                <tr>
                    <td><?= $person->name ?></td>
                    <td><?= $person->start_date ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</div>

</body>
</html>
