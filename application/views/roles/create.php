<?php $this->load->view('templates/header'); ?>


    <div class="d-flex align-items-center gap-3 mb-4 ">

        <a
            href="<?= site_url('role') ?>"
            class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
            style="width:40px; height:40px;"
            title="Voltar para a tela inicial"
        >
            <i class="bi bi-arrow-left"></i>
        </a>

        <div>
    <h1 class="display-6 fw-bold">Novo Cargo</h1>
    <p class="text-muted">Cadastre um novo cargo para a organização</p>
        </div>

    </div>
<div class="row justify-content-center">
    <div class="col-lg-6">

        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="card-title mb-4">
                    <i class="bi bi-briefcase-fill me-2"></i>
                    Dados do cargo
                </h5>

                <form action="<?= site_url('role/store') ?>" method="post">

                    <div class="mb-4">
                        <label class="form-label">Nome do cargo</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control form-control-lg"
                            placeholder="Ex: Desenvolvedor Frontend"
                            required
                        >
                    </div>

                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-save me-1"></i> Salvar
                        </button>

                    
                </form>

            </div>
        </div>

    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
