<?php

if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $nama_pelanggan=$_POST['nama_pelanggan'];
    $alamat=$_POST['alamat'];
    $no_telp=$_POST['telp'];

    if(empty($id_pelanggan)){
        echo "<script>alert('Id Pelanggan tidak boleh kosong');location.href='pelanggan.php';</script>";
    } elseif(empty($nama_pelanggan)){
        echo "<script>alert('Nama Pelanggan tidak boleh kosong');location.href='pelanggan.php';</script>";
    } elseif(empty($alamat)){
        echo "<script>alert('Alamat tidak boleh kosong');location.href='pelanggan.php';</script>";
    } elseif(empty($no_telp)){
        echo "<script>alert('No Telp tidak boleh kosong');location.href='pelanggan.php';</script>";
    } else {
        include "koneksi_toko.php";
            $update=mysqli_query($conn,"update pelanggan set nama='".$nama_pelanggan."',alamat='".$alamat."', telp='".$no_telp."' where `id_pelanggan` = '".$id_pelanggan."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        }
}


?>