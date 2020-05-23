<?php
    session_start();
    //Sertakan fungsi dan sambungkan ke database menggunakan PDO MySQL
    include 'functions.php';
    $pdo = pdo_connect_mysql();

    //Halaman diatur ke home (home.php) secara default, jadi ketika pengunjung mengunjungi itu akan menjadi halaman yang mereka lihat.
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
    
    // Sertakan dan tampilkan halaman yang diminta
    include $page . '.php';
?>