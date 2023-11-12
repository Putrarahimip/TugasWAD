<?php
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
            <div class="mt-3">
                <h3 class="text-center">welcome to my website</h3>
            </div>

            <div class="card mt-3">
            <div class="card-header bg-info text-white">
                Data Barang Toko laptop
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                Tambah Data
                </button>
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>ID Barang</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>stok</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                        //menampilkan data
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM crud ORDER BY id DESC");
                        while($data = mysqli_fetch_array($tampil)) : 
                    ?>


                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data ['id_barang']?></td>
                        <td><?= $data ['kategori']?></td>
                        <td><?= $data ['nama_barang']?></td>
                        <td><?= $data ['harga']?></td>
                        <td><?= $data ['stok']?></td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>" >Ubah</a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                        </td>
                    </tr>

                    <!-- AwalModal Ubah-->
                <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Laptop</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="function.php">
                            <input type="hidden" name="id" value="<?=$data['id']?>">

                        <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">ID Barang</label>
                                        <input type="text" class="form-control" name="uid" value="<?= $data['id'] ?>"
                                         placeholder="Masukkan Id Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-select" name="ukategori">
                                        <option value="<?= $data['kategori'] ?><?= $data['kategori'] ?>"></option>
                                            <option value="office"> Laptop Office</options>
                                            <option value="gaming"> Laptop Gaming</option> 
                                            <option value="ultrabook"> Ultrabook</option> 
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="unama"  value="<?= $data['nama_barang'] ?>"
                                        placeholder="Masukkan Nama barang">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga</label>
                                        <input type="text" class="form-control" name="uharga" value="<?= $data['harga'] ?>"
                                        placeholder="Masukkan Harga">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Stok</label>
                                        <input type="text" class="form-control" name="ustok" value="<?= $data['stok'] ?>"
                                        placeholder="Masukkan Stok yang tersedia">
                                    </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="zubah">Ubah</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                    
            <!-- Akhir Modal Ubah-->
                    
                    <!-- AwalModal Hapus-->
                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="function.php">
                            <input type="hidden" name="id" value="<?=$data['id']?>">

                        <div class="modal-body">

                            <h5 class="text-center">Apakah anda yakin ingin hapus?<br>
                                <span class="text-danger"><?=$data['id_barang']?> - <?=$data['kategori']?></span>
                        </h5>    
             
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="zhapus">Hapus</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                    
            <!-- Akhir Modal Hapus-->


                    <?php endwhile; ?>
                </table>

                <!-- AwalModal -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Laptop</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="function.php">
                        <input type="hidden" name="id" value="<?=$data['id']?>">

                        <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">ID Barang</label>
                                        <input type="text" class="form-control" name="uid" value=""
                                         placeholder="Masukkan Id Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-select" name="ukategori">
                                        <option value=""></option>
                                            <option value="office"> Laptop Office</options>
                                            <option value="gaming"> Laptop Gaming</option> 
                                            <option value="ultrabook"> Ultrabook</option> 
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="unama"  value=""
                                        placeholder="Masukkan Nama barang">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga</label>
                                        <input type="text" class="form-control" name="uharga" value=""
                                        placeholder="Masukkan Harga">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Stok</label>
                                        <input type="text" class="form-control" name="ustok" value=""
                                        placeholder="Masukkan Stok yang tersedia">
                                    </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="zsimpan">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal -->

            </div>
            </div>

        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>