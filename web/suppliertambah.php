<?php 
    require_once("../db_koneksi/koneksidb.php");
    
    if(isset($_POST['btnsimpan'])=='btnsimpan'){
        $KodeSupplier = trim($_POST['KodeSupplier']);
        $Nama = trim($_POST['Nama']);
        $Alamat = trim($_POST['Alamat']);
        $Telp = trim($_POST['Telp']);

        $query_sql = "INSERT INTO tb_supplier (KodeSupplier, Nama, Alamat, Telp) VALUES ('$KodeSupplier', '$Nama', '$Alamat', '$Telp');";
        $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
        if($sql) {
            echo "<script>alert('Berhasil Simpan')</script>";
            echo "<script>window.location.href='supplier.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require_once("menu.php"); ?>
    <br>

    <div class="container">
        <h2>Tambah Data Supplier</h2>

        <form method="post" name="form1">
            <div class="form-group">
                <div class="form-group">
                    <label for="KodePetugas">Kode Supplier:</label>
                    <input type="text" required name="KodeSupplier" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Nama">Nama :</label>
                    <input type="text" required name="Nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Jabatan">Alamat :</label>
                    <input type="text" required name="Alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Password">Telp :</label>
                    <input type="text" required name="Telp" class="form-control">
                </div>
            </div>

            <div class="form-check mt-3">
                <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit"> Simpan
                    <i class="ace-icon fa fa-signal"></i>
                </button>
                <button class="btn btn-danger" type="reset"> Reset
                    <i class="ace-icon fa fa-signal"></i>
                </button>
                <a href="petugas.php"><button class="btn btn-primary" type="button">Data Petugas <i class="ace-icon fa fa-signal"></i></button></a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

