<?php
    $server = 'localhost:3308';
    $user = 'root';
    $password = '';
    $database = 'laptop';

    $koneksi = mysqli_connect($server, $user, $password, $database) or die (mysqli_error($koneksi));