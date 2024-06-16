<?php 
    require_once'../db_koneksi/koneksidb.php';


    $KodePelanggan = $_GET['id'];
    // Pastikan $KodePetugas di-escape dengan benar untuk mencegah serangan injeksi SQL
    $escapedKodePelanggan = mysqli_real_escape_string($koneksidb, $KodePelanggan);
    $query_sql = "DELETE FROM tb_pelanggan WHERE KodePelanggan = '$escapedKodePelanggan'";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script>alert('Berhasil Simpan')</script>";
        echo "<script>window.location.href='pelanggan.php'</script>";
    }
?>
