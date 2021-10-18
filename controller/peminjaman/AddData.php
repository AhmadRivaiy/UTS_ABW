<!-- Modal Tambah Peminjaman -->
<div class="modal fade" id="staticBackdropPeminjaman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropPeminjamanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropPeminjamanLabel">Tambah Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="formAddPeminjaman">
                <div class="modal-body">
                    <div class="bg-card p-2">
                        <div class="mb-3">
                            <label for="peminjamAnggota" class="form-label">Pilih Peminjam</label>
                            <select class="form-select" name="id_anggota" id="peminjamAnggota" required>
                                <option disabled="" selected="">-Pilih-</option>
                                <?php
                                    include "../../config/config.php";
                                    $no=1;
                                    $query=mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY nama ASC") or die(mysqli_error($koneksi));
                                    while ($result=mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $result['id_anggota']; ?>"><?php echo $result['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Pilih Judul Buku</label>
                            <select class="form-select" name="kode_buku" id="judulBuku" required>
                                <option disabled="" selected="">-Pilih-</option>
                                <?php
                                    include "../../config/config.php";
                                    $no=1;
                                    $query=mysqli_query($koneksi, "SELECT * FROM buku ORDER BY judul ASC") or die(mysqli_error($koneksi));
                                    while ($result=mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $result['kode_buku']; ?>"><?php echo $result['judul']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tglTenggat" class="form-label">Tanggal Tenggat</label>
                            <input type="date" class="form-control" name="tanggal_pinjam" id="tglTenggat" required>
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