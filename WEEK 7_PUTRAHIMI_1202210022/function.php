<?php

include "koneksi.php";

if (isset($_POST['zsimpan'])){
     
    //penyimpanan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO crud (id_barang, kategori, nama_barang, harga, stok)
                                        VALUES ('$_POST[uid]',
                                                '$_POST[ukategori]',
                                                '$_POST[unama]',
                                                '$_POST[uharga]',
                                                '$_POST[ustok]') ");

    //jika simpan sukses
    if($simpan){
        echo "<script>alert('Simpan data Sukses ! ')
            document.location='beranda.php'
            </script>";
    }else{
        echo "<script>alert('Simpan data Gagal ! ')
            document.location='beranda.php'
            </script>";
    }
                                      
}

if (isset($_POST['zubah'])){
     
    //mengubah data
    $ubah = mysqli_query($koneksi, "UPDATE crud SET
                            id_barang = '$_POST[uid]',
                            kategori = '$_POST[ukategori]',
                            nama_barang = '$_POST[unama]',
                            harga = '$_POST[uharga]',
                            stok = '$_POST[ustok]'  
                            WHERE id = '$_POST[id]'
                            ");

    //jika ubah sukses
    if($ubah){
        echo "<script>alert('Ubah data Sukses ! ')
            document.location='beranda.php'
            </script>";
    }else{
        echo "<script>alert('Ubah data Gagal ! ')
            document.location='beranda.php'
            </script>";
    }
                                      
}


//jika tombol hapus
if (isset($_POST['zhapus'])){
     
    //penghapusan data
    $hapus = mysqli_query($koneksi, "DELETE FROM crud WHERE id = '$_POST[id]' ");

    //jika hapus sukses
    if($hapus){
        echo "<script>alert('Hapus data Sukses ! ')
            document.location='beranda.php'
            </script>";
    }else{
        echo "<script>alert('Hapus data Gagal ! ')
            document.location='beranda.php'
            </script>";
    }
                                      
}
