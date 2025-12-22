<?php $this->load->view('templates/header'); ?>


    <div class="d-flex align-items-center gap-3 mb-4 ">

        <a
            href="<?= site_url('people') ?>"
            class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
            style="width:40px; height:40px;"
            title="Voltar para a tela inicial"
        >
            <i class="bi bi-arrow-left"></i>
        </a>

        <div>
    <h1 class="display-6 fw-bold">Cadastrar Pessoa</h1>
    <p class="text-muted">Informe os dados básicos para criar um novo cadastro</p>
        </div>

    </div>

<div class="row justify-content-center">
    <div class="col-lg-6">

        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="card-title mb-4">
                    <i class="bi bi-person-plus-fill me-2"></i>
                    Dados da pessoa
                </h5>

                <form method="post" action="<?= site_url('people/store') ?>">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control form-control-lg"
                            placeholder="Nome completo"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control form-control-lg"
                            placeholder="email@exemplo.com"
                            required
                        >
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Data de nascimento</label>
                            <input
                                type="date"
                                name="birth_date"
                                class="form-control"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telefone</label>
                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                placeholder="(00) 00000-0000"
                            >
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-check-circle me-1"></i> Salvar
                        </button>

                </form>

            </div>
        </div>

    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
