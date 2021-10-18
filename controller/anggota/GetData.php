<div>
    <button class="btn btn-primary text-center" type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#staticBackdropAnggota" onclick="addAnggotaBtn()">Tambah Anggota</button>
    <?php //include './AddData.php'; ?>
</div>
<br />
<div class="bg-card" align="center">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>NRP</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Nomor Hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../config/config.php";
            $no=1;
            $query=mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY nama ASC") or die(mysqli_error($koneksi));
            while ($result=mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $result['nrp']; ?>
                </td>
                <td>
                    <?php echo $result['nama']; ?>
                </td>
                <td>
                    <?php echo $result['tgl_lahir']; ?>
                </td>
                <td>
                    <?php echo $result['alamat']; ?>
                </td>
                <td>
                    <?php echo $result['no_hp']; ?>
                </td>
                <td>
                    <button id="editButton" class="btn btn-sm btn-warning"
                        value="<?php echo $result['id_anggota']; ?>">Edit</button>
                    <button id="deleteButton" class="btn btn-sm btn-danger"
                        value="<?php echo $result['id_anggota']; ?>">Delete</button>
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