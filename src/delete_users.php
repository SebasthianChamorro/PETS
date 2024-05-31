<?php
if(isset($_GET['id'])) {

    $id_usuario = $_GET['id'];
    require('../config/database.php');
    $query_eliminar_usuario = "DELETE FROM users WHERE id = $id_usuario";
    $result_eliminar = pg_query($conn, $query_eliminar_usuario);
    if($result_eliminar) {
        header("refresh:0;url=list_users.php");
    } else {
        echo "Error.";
    }
} else {
    echo "No se proporcionó el parámetro 'id' en la URL.";
}
?>