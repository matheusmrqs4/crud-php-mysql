<?php

require 'connect.php';
/**
 *
 */
$id = $_GET['id'];
$sql = "DELETE FROM `list` WHERE id = $id";
$query = mysqli_query($conn, $sql);
if ($query) {
    header("Location: index.php?msg=Excluido com Sucesso!");
} else {
    echo "Erro" . mysqli_error($conn);
}
