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
</div>

</body>
</html>
