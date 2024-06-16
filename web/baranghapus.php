<?php 
    require_once'../db_koneksi/koneksidb.php';

    $KodeBarang = $_GET['id'];
    // Pastikan $KodePetugas di-escape dengan benar untuk mencegah serangan injeksi SQL
    $escapedKodeBarang = mysqli_real_escape_string($koneksidb, $KodeBarang);
    $query_sql = "DELETE FROM tb_barang WHERE Kodebarang = '$escapedKodeBarang'";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script>alert('Berhasil Simpan')</script>";
        echo "<script>window.location.href='barang.php'</script>";
    }
?>
