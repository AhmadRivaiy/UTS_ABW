<?php
 include "../../config/config.php";
 $kodeBuku  = $_GET['kodeBuku'];
 $query     = mysqli_query($koneksi, "SELECT * FROM buku WHERE kode_buku='$kodeBuku'") or die(mysqli_error($koneksi));
 $result    = mysqli_fetch_array($query);
?>

<form method="POST" id="formEdit">
    <div class="modal-body">
        <div class="bg-card p-2">
            <div class="mb-3">
                <label for="judulBuku" class="form-label">Judul Buku</label>
                <input type="hidden" name="kode_buku" id="kodeBuku" required=""
                    value="<?php echo $result['kode_buku']; ?>" />
                <input type="text" class="form-control" name="judul" id="judulBuku" required=""
                    value="<?php echo $result['judul']; ?>" />
            </div>
            <div class="mb-3">
                <label for="pengarangBuku" class="form-label">Pengarang</label>
                <input type="text" class="form-control" name="pengarang" id="pengarangBuku" required=""
                    value="<?php echo $result['pengarang']; ?>" />
            </div>
            <div class="mb-3">
                <label for="penerbitBuku" class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbitBuku" required=""
                    value="<?php echo $result['penerbit']; ?>">
            </div>
            <div class="mb-3">
                <label for="rakBuku" class="form-label">Judul Buku</label>
                <select class="form-select" name="rak" id="rakBuku" required>
                    <option disabled="" selected="">-Pilih-</option>
                    <option value="A012" <?php if($result[ 'rak']=="A012" ) echo "selected"; ?>>A012</option>
                    <option value="A013" <?php if($result[ 'rak']=="A013" ) echo "selected"; ?>>A013</option>
                    <option value="B012" <?php if($result[ 'rak']=="B012" ) echo "selected"; ?>>B012</option>
                </select>
            </div>
            <div class="mb-3">

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button id="cancelButton" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
        <input data-bs-dismiss="modal" type="submit" class="btn btn-primary" name="simpan" id="simpan" value="Simpan" />
    </div>
</form>