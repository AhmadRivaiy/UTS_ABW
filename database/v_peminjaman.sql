/* QUERY UNTUK VIEW v_peminjaman */

select `a`.`id_pinjam` AS `id_pinjam`,`a`.`id_anggota` AS `id_anggota`,`b`.`nrp` AS `nrp`,`a`.`kode_buku` AS `kode_buku`,`a`.`tanggal_pinjam` AS `tanggal_pinjam`,`a`.`tanggal_kembali` AS `tanggal_kembali`,`a`.`denda` AS `denda`,`b`.`nama` AS `nama`,`c`.`judul` AS `judul`,`c`.`pengarang` AS `pengarang`,`c`.`penerbit` AS `penerbit`,`c`.`rak` AS `rak` from ((`pinjam` `a` join `anggota` `b` on(`a`.`id_anggota` = `b`.`id_anggota`)) join `buku` `c` on(`a`.`kode_buku` = `c`.`kode_buku`)) order by `a`.`tanggal_pinjam` desc
