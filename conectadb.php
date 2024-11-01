<?php
$link = mysqli_connect('localhost', 'root', '', 'arcaderocket');

if (!$link) {
    die('Erro de conexão: ' . mysqli_connect_error());
}
?>
