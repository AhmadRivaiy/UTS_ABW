<!-- Modal Tambah Anggota -->
<div class="modal fade" id="staticBackdropAnggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabelAnggota" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabelAnggota">Tambah Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="formAddAnggota">
                    <div class="modal-body">
                        <div class="bg-card p-2">
                            <div class="mb-3">
                                <label for="nrpMahasiswa" class="form-label">NRP Mahasiswa</label>
                                <input type="number" class="form-control" name="nrp" id="nrpMahasiswa">
                            </div>
                            <div class="mb-3">
                                <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama" id="namaMahasiswa">
                            </div>
                            <div class="mb-3">
                                <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tglLahir">
                            </div>
                            <div class="mb-3">
                                <label for="alamatMahasiswa" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamatMahasiswa" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="noHp" class="form-label">No. HP</label>
                                <input type="number" class="form-control" name="no_hp" id="noHp">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="cancelButton" class="btn btn-secondary" type="button"
                            data-bs-dismiss="modal">Batal</button>
                        <input data-bs-dismiss="modal" type="submit" class="btn btn-primary" name="simpan" id="simpan" value="Simpan" />
                    </div>
                </form>
            </div>
        </div>
    </div>