<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Gestão de pessoa' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('/') ?>">Gestão de pessoa</a>
    </div>
</nav>

<div class="container">
    <?php $this->load->view($view, $data ?? []); ?>
</div>

</body>
</html>
