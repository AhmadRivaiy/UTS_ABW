<div>
    <button class="btn btn-primary text-center" type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop" onclick="addBukuBtn()">Tambah Buku</button>
</div>
<br />
<div class="bg-card" align="center">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Rak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../config/config.php";
            $no=1;
            $query=mysqli_query($koneksi, "SELECT * FROM buku ORDER BY judul DESC") or die(mysqli_error($koneksi));
            while ($result=mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $result['judul']; ?>
                </td>
                <td>
                    <?php echo $result['pengarang']; ?>
                </td>
                <td>
                    <?php echo $result['penerbit']; ?>
                </td>
                <td>
                    <?php echo $result['rak']; ?>
                </td>
                <td>
                    <button id="EditButton" class="btn btn-sm btn-warning"
                        value="<?php echo $result['kode_buku']; ?>">Edit</button>
                    <button id="DeleteButton" class="btn btn-sm btn-danger"
                        value="<?php echo $result['kode_buku']; ?>">Delete</button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <div class="my-footer-card">
        <div>
            <h6>
                3120510901 | Ahmad Rivaiy
            </h6>
        </div>
        <div>
            <h6>
                AJAX CRUD | UTS Workshop Pemograman Web
            </h6>
        </div>
    </div>
</div>