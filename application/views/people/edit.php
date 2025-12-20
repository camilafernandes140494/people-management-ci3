<!DOCTYPE html>
<html>
<head>
    <title>Editar Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Editar Pessoa</h1>

    <form action="<?= site_url('people/update/'.$person->id) ?>" method="post">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control"
                   value="<?= $person->name ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?= $person->email ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="birth_date" class="form-control"
                   value="<?= $person->birth_date ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="phone" class="form-control"
                   value="<?= $person->phone ?>">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?= site_url('people') ?>" class="btn btn-secondary">Voltar</a>
    </form>
    <hr>

<h4>Vincular novo cargo</h4>

<form method="post" action="<?= site_url('people/assignRole/'.$person->id) ?>">

    <div class="mb-3">
        <label class="form-label">Cargo</label>
        <select name="role_id" class="form-select" required>
            <option value="">Selecione</option>
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

    <button type="submit" class="btn btn-success">
        Vincular Cargo
    </button>

</form>
<hr>

<h4>Histórico de Cargos</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Cargo</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($history as $item): ?>
            <tr>
                <td><?= $item->role_name ?></td>
                <td><?= $item->start_date ?></td>
                <td><?= $item->end_date ?? 'Atual' ?></td>
                <td>
                    <a href="<?= site_url('people/editHistory/'.$item->id) ?>"
                       class="btn btn-sm btn-warning">
                        Editar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</div>

</body>
</html>
