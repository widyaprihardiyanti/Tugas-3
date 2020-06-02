<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

   <div class="container" style="margin: 20px auto;">
       <div class="panel panel-default">
           <div class="panel-body">
           <div class="row" style="margin-botton: 20px;">
               <div class="col-md-12">
                   <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalInput">Tambah Data</a>
               </div>
           </div>
               <table class="table table-bordered table-condensed table-striped">
               <thead>
                   <th style="text-align: center">No</th>
                   <th style="text-align: center">NIS</th>
                   <th style="text-align: center">Nama</th>
                   <th style="text-align: center">Jenis Kelamin</th>
                   <th style="text-align: center">Alamat</th>
                   <th style="text-align: center"colspan="2">Opsi</th>
               </thead>
               <tbody>
                   <?php
                       include"koneksi.php";
                       $no = 1;
                       $query = "SELECT * FROM tbl_widya_xirpl2";
                       $sql = mysqli_query($conn, $query);
                       while($baris = mysqli_fetch_array($sql)){
                   ?>
                   <tr>
                       <td><?php echo $no++; ?></td>
                       <td><?php echo $baris['nis']?></td>
                       <td><?php echo $baris['nama']?></td>
                       <td><?php echo $baris['jenis_kelamin']?></td>
                       <td><?php echo $baris['alamat']?></td>
                       <td style="text-align: center">
                           <a href="edit.php?nis=<?php echo $baris['nis']?>" class="btn btn-warning btn-xs">Edit</a>
                       </td>
                       <td style="text-align: center">
                           <a href="hapus.php?nis=<?php echo $baris['nis']?>" class="btn btn-danger btn-xs">Hapus</a>
                       </td>
                   </tr>   
                   <?php } ?>   
               </tbody>
               </table>
           </div>
       </div>
   </div>

   <!-- ModalInput -->
   <div class="modal fade" id="ModalInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-tittle" id="myModalLabel">Tambah Data</h4>
            </div>
            <form action="" method="post">
            <div class="modal-body">
               <form action="">
            <div class="form-group">
               <label for="nis">NIS</label>
               <input required type="number" class="form-control" name="nis" id="nis" placeholder="NIS...">
            </div>
            <div class="form-group">
               <label for="nama">Nama Siswa</label>
               <input required type="text" class="form-control" name="nama"id="nama" placeholder="Nama Siswa...">
            </div>
            <div class="form-group">
               <label for="jk">Jenis Kelamin</label>
               <select required type="form-control" name="jk">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
               <label required for="alamat">Alamat</label>
               <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>
        </div>
            <div class="modal-footer">
            <button type="reset" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
            <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
         </form>
      </div>
   </div>
   </div>

   <script src="assets/jquery/jquery-3.3.1.slim.min.js"></script>
   <script src="assets/popper/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['simpan'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO tbl_widya_xirpl2(nis, nama, jenis_kelamin, alamat) VALUES('$nis', '$nama', '$jk', '$alamat')";
    $sql = mysqli_query($conn, $query);

    if($sql){
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('Data Gagal Disimpan')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>