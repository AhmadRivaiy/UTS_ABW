<?php
 include "../../config/config.php";
 $idAnggota  = $_GET['idAnggota'];
 $query     = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$idAnggota'") or die(mysqli_error($koneksi));
 $result    = mysqli_fetch_array($query);
?>

<form method="POST" id="formEditAnggota">
    <div class="modal-body">
        <div class="bg-card p-2">
            <div class="mb-3">
                <label for="nrpMahasiswa" class="form-label">NRP Mahasiswa</label>
                <input type="hidden" name="id_anggota" id="idAnggota" required="" value="<?php echo $result['id_anggota']; ?>" />
                <input type="number" class="form-control" name="nrp" id="nrpMahasiswa" value="<?php echo $result['nrp']; ?>"/>
            </div>
            <div class="mb-3">
                <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama" id="namaMahasiswa" value="<?php echo $result['nama']; ?>" />
            </div>
            <div class="mb-3">
                <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tglLahir" value="<?php echo $result['tgl_lahir']; ?>" />
            </div>
            <div class="mb-3">
                <label for="alamatMahasiswa" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamatMahasiswa" rows="5" required /><?php echo $result['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="noHp" class="form-label">No. HP</label>
                <input type="number" class="form-control" name="no_hp" id="noHp" value="<?php echo $result['no_hp']; ?>" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button id="cancelButton" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
        <input data-bs-dismiss="modal" type="submit" class="btn btn-primary" name="simpan" id="simpan" value="Simpan" />
    </div>
</form>