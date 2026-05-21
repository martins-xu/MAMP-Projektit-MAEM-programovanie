<?php
include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if (is_numeric($id)) {
        $sql = "DELETE FROM books WHERE id = $id";
        mysqli_query($conn, $sql);
    }
}

header("Location: index.php");
exit;
?>