<?php
include "config.php";

switch ($_GET['action'])
{
    case 'save':
        $judulBuku = $_POST['judul'];
        $pengarangBuku = $_POST['pengarang'];
        $penerbitBuku = $_POST['penerbit'];
        $rakBuku = $_POST['rak'];

        $query = mysqli_query($koneksi, "INSERT INTO buku(judul, pengarang, penerbit, rak) VALUES('$judulBuku', '$pengarangBuku', '$penerbitBuku', '$rakBuku')");
        if ($query){
            echo "Simpan Data Berhasil";
        }else{
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'edit':
        $kodeBuku       = $_POST['kode_buku'];
        $judulBuku      = $_POST['judul'];
        $pengarangBuku  = $_POST['pengarang'];
        $penerbitBuku   = $_POST['penerbit'];
        $rakBuku        = $_POST['rak'];

        $query = mysqli_query($koneksi, "UPDATE buku SET judul='$judulBuku', pengarang='$pengarangBuku', penerbit='$penerbitBuku', rak='$rakBuku' WHERE kode_buku='$kodeBuku'");
        if ($query){
            echo "Edit Data Berhasil";
        }else{
            echo "Edit Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'delete':
        $kodeBuku = $_POST['kodeBuku'];
        $query = mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku='$kodeBuku'");
        if ($query){
            echo "Hapus Data Berhasil";
        }else{
            echo "Hapus Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'saveAnggota':
        $nrpAnggota     = $_POST['nrp'];
        $namaAnggota    = $_POST['nama'];
        $tglLahir       = $_POST['tgl_lahir'];
        $alamatAnggota  = $_POST['alamat'];
        $noHP           = $_POST['no_hp'];

        $query = mysqli_query($koneksi, "INSERT INTO anggota(nrp, nama, tgl_lahir, alamat, no_hp) VALUES($nrpAnggota, '$namaAnggota', '$tglLahir', '$alamatAnggota', $noHP)");
        if ($query){
            echo "Simpan Data Berhasil";
        }else{
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'editAnggota':

        $idAnggota      = $_POST['id_anggota'];
        $nrpAnggota     = $_POST['nrp'];
        $namaAnggota    = $_POST['nama'];
        $tglLahir       = $_POST['tgl_lahir'];
        $alamatAnggota  = $_POST['alamat'];
        $noHP           = $_POST['no_hp'];

        $query = mysqli_query($koneksi, "UPDATE anggota SET nrp=$nrpAnggota, nama='$namaAnggota', tgl_lahir='$tglLahir', alamat='$alamatAnggota', no_hp='$noHP' WHERE id_anggota='$idAnggota'");
        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'deleteAnggota':

        $idAnggota = $_POST['idAnggota'];
        $query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$idAnggota'");
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'savePeminjaman':
        $idAnggota     = $_POST['id_anggota'];
        $kodeBuku       = $_POST['kode_buku'];
        $tglPinjam      = $_POST['tanggal_pinjam'];

        $query = mysqli_query($koneksi, "INSERT INTO pinjam(id_anggota, kode_buku, tanggal_pinjam) VALUES($idAnggota, '$kodeBuku', '$tglPinjam')");
        if ($query){
            echo "Simpan Data Berhasil";
        }else{
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'kembaliPeminjaman':
        $idPeminjaman      = $_POST['idPeminjaman'];
        $tglPinjam         = $_POST['tglPinjam'];

        $tanggal1 = new DateTime($tglPinjam);
        $tanggal2 = new DateTime();
        $denda    = 5000;

        $perbedaan = $tanggal2->diff($tanggal1)->format("%a") - 3;
        if($perbedaan > 0 ){
            $denda = ($perbedaan*$denda);

            $query = "UPDATE pinjam SET tanggal_kembali=now(), denda=$denda WHERE id_pinjam=$idPeminjaman";
            $result = mysqli_query($koneksi, $query);
            if ($result){
                echo "Edit Data Berhasil";
            }else{
                echo "Edit Data Gagal :" . mysqli_error($koneksi);
            }
        }else{
            $query = "UPDATE pinjam SET tanggal_kembali=now(), denda=0 WHERE id_pinjam=$idPeminjaman";
            $result = mysqli_query($koneksi, $query);
            if ($result){
                echo "Edit Data Berhasil";
            }else{
                echo "Edit Data Gagal :" . mysqli_error($koneksi);
            }
        }
    break;

    case 'deletePeminjaman':
        $idPeminjaman = $_POST['idPeminjaman'];
        $query = mysqli_query($koneksi, "DELETE FROM pinjam WHERE id_pinjam='$idPeminjaman'");
        if ($query){
            echo "Hapus Data Berhasil";
        }else{
            echo "Hapus Data Gagal :" . mysqli_error($koneksi);
        }
    break;

	case 'getChart':
        $qy = '
        SELECT
            b.judul,
            COUNT(a.kode_buku) AS jml_buku_pinjam
        FROM
            pinjam a
        JOIN buku b ON a.kode_buku = b.kode_buku
        JOIN anggota c ON a.id_anggota = c.id_anggota
        GROUP BY b.judul, a.kode_buku';
    	$query = mysqli_query($koneksi, $qy) or die(mysqli_error($koneksi));
                
   	 	$i = 0;
    	while($row = mysqli_fetch_array($query)){
        	$datas[$i]['name'] = $row['judul'];
        	$datas[$i]['y'] = intval($row['jml_buku_pinjam']);
                
        	$i++;
    	}
    
    	$myJSON = json_encode($datas);
        if ($query){
    		echo $myJSON;
        }else{
    		echo json_encode([]);
        }
    break;
}
?>