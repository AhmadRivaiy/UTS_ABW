<div class="sub-title-btn">
    <div>
        <button class="btn btn-primary text-center" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#staticBackdropPeminjaman" onclick="addPeminjamanBtn()">Tambah Peminjaman</button>
    </div>
    <div>
        <form action="./config/topdf.php" method="POST" class="needs-validation" novalidate>
            <button type="submit" class="btn btn-warning">Ambil PDF</button>
        </form>
    </div>
</div>
<br />
<div class="bg-card" align="center">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Tanggal Tenggat</th>
                <th>Tanggal Pengembalian</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../config/config.php";
            $no=1;
            $query=mysqli_query($koneksi, "SELECT * FROM v_peminjaman") or die(mysqli_error($koneksi));
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
                    <?php echo $result['judul']; ?>
                </td>
                <td>
                    <?php echo $result['tanggal_pinjam']; ?>
                </td>
                <td>
                    <?php echo $result['tanggal_kembali']; ?>
                </td>
                <td>
                    <?php echo "Rp " . number_format($result['denda'],2,',','.'); ?>
                </td>
                <td>
                    <?php if($result['tanggal_kembali'] == null){ ?>
                    <button id="kembaliButton" class="btn btn-sm btn-info" value="<?php echo $result['id_pinjam']; ?>"
                        tglPinjam="<?php echo $result['tanggal_pinjam']; ?>">Buku Kembali</button>
                    <button id="deleteButton" class="btn btn-sm btn-danger"
                        value="<?php echo $result['id_pinjam']; ?>">Delete</button>
                    <?php }else{ ?>
                    <span class="badge bg-success">Telah Kembali!</span>
                    <?php } ?>
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