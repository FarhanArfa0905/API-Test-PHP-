<?php 
    require_once('../db_koneksi/koneksidb.php');
    $query_sql = "SELECT * FROM tb_supplier";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    $totaldata = mysqli_num_rows($sql);
    $data = mysqli_fetch_assoc($sql);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Aplikasi PHP MySQL</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once('menu.php');?>
        <br>
        <div class="container">
            <h2>Data Supplier</h2>
            <a href="suppliertambah.php"><button class="btn btn-primary mb-3" type="button">Tambah Supplier</button> <i class="ace-icon fa fa-signal"></i></a>
            <br>

            <table align="table-responsive" class=" table table-striped table-bordered table-hover" id="dynamic-table">
                <thead>
                    <th>Ubah / Hapus</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                </thead>
                <tbody>
                    <?php do {
                        if($totaldata==0) {
                            echo"Data Kosong";
                        }else{ ?>
                    <tr>
                        <td>
                            <a href="supplieredit.php?id=<?php echo $data['KodeSupplier'];?>"><button class="btn btn-warning">Ubah</button></a>
                            <a href="supplierhapus.php?id=<?php echo $data['KodeSupplier'];?>"><button class="btn btn-danger">Hapus</button></a>
                        </td>
                        <td><?php echo $data['KodeSupplier'];?></td>
                        <td><?php echo $data['Nama'];?></td>
                        <td><?php echo $data['Alamat'];?></td>
                        <td><?php echo $data['Telp'];?></td>
                    </tr>
                            <?php }
                        } while ($data = mysqli_fetch_assoc($sql));
                    ?>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>