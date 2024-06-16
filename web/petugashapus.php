<?php 
    require_once('../db_koneksi/koneksidb.php');

    $KodePetugas = $_GET['id'];
    // Pastikan $KodePetugas di-escape dengan benar untuk mencegah serangan injeksi SQL
    $escapedKodePetugas = mysqli_real_escape_string($koneksidb, $KodePetugas);
    $query_sql = "DELETE FROM tb_petugas WHERE KodePetugas = '$escapedKodePetugas'";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script>alert('Berhasil Simpan')</script>";
        echo "<script>window.location.href='petugas.php'</script>";
    }
?>
