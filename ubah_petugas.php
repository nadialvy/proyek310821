<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ubah Petugas</title>
</head>
<body>

    <?php 
    include "koneksi_toko.php";
    //mengambil data petugas yang akan diubah
    $qry_get_petugas = mysqli_query($conn,"select * from petugas where id_petugas = '".$_GET['id_petugas']."'");
    $dt_petugas = mysqli_fetch_array($qry_get_petugas);
    ?>

    <div class="container">
    <center>
        <h3><b>Ubah Petugas</b></h3>
    </center>
    
    <form action="proses_ubah_petugas.php" method="post">
        <input type="hidden" name="id_petugas" value="<?=$dt_petugas['id_petugas']?>">
        
        Nama Pelanggan :
        <input type="text" name="nama_petugas" value="<?=$dt_petugas['nama_petugas']?>" class="form-control">
       
        Username :
        <input type="text" name="username" value="<?=$dt_petugas['username']?>" class="form-control">

        Password :
        <input type="password" name="telp" value="<?=$dt_petugas['password']?>" class="form-control">

        Level :
        <select name="level" class="form-control">
            <option></option>
            <?php
                include "koneksi_toko.php";
                $qry_level = mysqli_query($conn, "SELECT DISTINCT level FROM petugas");

                while($data_level = mysqli_fetch_array($qry_level)){
                    if($data_level['level'] == $dt_petugas['level']){
                        $selek = "selected";
                    } else {
                        $selek = "";
                    }
                    echo '<option value="'.$data_level['level'].'" '.$selek.'>'.$data_level['level'].'</option>';
                }
            ?>
        </select>
 
        <br>
        <input type="submit" name="simpan" value="Ubah Petugas" class="btn btn-primary">
    </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>