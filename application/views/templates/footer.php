    </div> <!-- fecha container principal, se existir -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="deleteModalTitle">
                        Confirmar exclusão
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p id="deleteModalMessage" class="mb-0"></p>
                    <p class="text-muted mt-2 mb-0">
                        Esta ação não poderá ser desfeita.
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <a href="#" id="confirmDeleteBtn" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i> Excluir
                    </a>
                </div>

            </div>
        </div>
    </div>


    <script>
        const deleteModal = document.getElementById('confirmDeleteModal');

        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                const url = button.getAttribute('data-url');
                const title = button.getAttribute('data-title');
                const message = button.getAttribute('data-message');

                document.getElementById('deleteModalTitle').textContent = title;
                document.getElementById('deleteModalMessage').innerHTML = message;
                document.getElementById('confirmDeleteBtn').href = url;
            });
        }
    </script>

    </body>

    </html>