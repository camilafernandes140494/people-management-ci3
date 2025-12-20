<div class="container mt-4">
    <h2>Editar Histórico de Cargo</h2>

    <form method="post"
          action="<?= site_url('people/updateHistory/'.$history->id) ?>">

        <input type="hidden"
               name="redirect_to"
               value="<?= site_url('people/edit/'.$history->person_id) ?>">

        <div class="mb-3">
            <label class="form-label">Data de Início</label>
            <input type="date"
                   name="start_date"
                   class="form-control"
                   value="<?= $history->start_date ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Fim</label>
            <input type="date"
                   name="end_date"
                   class="form-control"
                   value="<?= $history->end_date ?>">
        </div>

        <button class="btn btn-primary">Salvar</button>
        <a href="<?= site_url('people/edit/'.$history->person_id) ?>"
           class="btn btn-secondary">
            Voltar
        </a>
    </form>
</div>
