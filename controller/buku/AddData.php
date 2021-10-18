<!-- Modal Tambah Buku -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="formAdd">
                <div class="modal-body">
                    <div class="bg-card p-2">
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" id="judulBuku" required>
                        </div>
                        <div class="mb-3">
                            <label for="pengarangBuku" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" id="pengarangBuku" required>
                        </div>
                        <div class="mb-3">
                            <label for="penerbitBuku" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbitBuku" required>
                        </div>
                        <div class="mb-3">
                            <label for="rakBuku" class="form-label">Judul Buku</label>
                            <select class="form-select" name="rak" id="rakBuku" required>
                                <option disabled="" selected="">-Pilih-</option>
                                <option value="A012">A012</option>
                                <option value="A013">A013</option>
                                <option value="B012">B012</option>
                            </select>
                        </div>
                        <div class="mb-3">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancelButton" class="btn btn-secondary" type="button"
                        data-bs-dismiss="modal">Batal</button>
                    <input data-bs-dismiss="modal" type="submit" class="btn btn-primary" name="simpan" id="simpan"
                        value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</div>