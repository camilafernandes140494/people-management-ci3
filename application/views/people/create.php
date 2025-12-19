<?php $this->load->view('templates/header'); ?>

<h2>Cadastrar Pessoa</h2>

<form method="post" action="<?= site_url('people/store') ?>">

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Data de nascimento</label>
        <input type="date" name="birth_date" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Salvar
    </button>
</form>

<?php $this->load->view('templates/footer'); ?>
