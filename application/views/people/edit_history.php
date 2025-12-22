<?php $this->load->view('templates/header'); ?>


<div class="d-flex align-items-center gap-3 mb-4 ">

    <a
        href="<?= site_url('people/edit/' . $history->person_id) ?>"
        class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
        style="width:40px; height:40px;"
        title="Voltar para a tela inicial">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>
        <h1 class="display-6 fw-bold">Editar Histórico de Cargo</h1>
        <p class="text-muted">Atualize as datas de vínculo do cargo</p>
    </div>

</div>

<div class="row justify-content-center">
    <div class="col-lg-6">

        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="card-title mb-4">
                    <i class="bi bi-clock-history me-2"></i>
                    Período do cargo
                </h5>

                <form
                    method="post"
                    action="<?= site_url('people/updateHistory/' . $history->id) ?>">

                    <input
                        type="hidden"
                        name="redirect_to"
                        value="<?= site_url('people/edit/' . $history->person_id) ?>">

                    <div class="mb-3">
                        <label class="form-label">Data de início</label>
                        <input
                            type="date"
                            name="start_date"
                            class="form-control form-control-lg"
                            value="<?= $history->start_date ?>"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Data de fim</label>
                        <input
                            type="date"
                            name="end_date"
                            class="form-control form-control-lg"
                            value="<?= $history->end_date ?>">
                        <div class="form-text">
                            Deixe em branco se este for o cargo atual
                        </div>
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