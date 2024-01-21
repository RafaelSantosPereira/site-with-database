<?php
    $liga = mysqli_connect('localhost', 'root', 'camarao6411');

    if (!$liga) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
    
    mysqli_select_db($liga, 'PC');
?>