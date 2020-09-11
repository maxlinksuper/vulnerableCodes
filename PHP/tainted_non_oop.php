<?php
    $id = $_POST["UserId"];                                               // Sources tainted data masukan pengguna
    $sql = "SELECT * FROM Users WHERE UserId = ".$id;                     // Query tainted karena memuat tainted data                                        
    $mysqli = mysqli_connect("HOST", "USERNAME", "PASSWORD", "DATABASE"); // Koneksi ke basis data
    $res = mysqli_query($mysqli, $sql);                                   // Melakukan query di basis data
    while ($row = mysqli_fetch_assoc($res)){                              // Mendapatkan hasil query
        echo implode(" ", $row);                                          // Menampilkan hasil query
    }
?>

