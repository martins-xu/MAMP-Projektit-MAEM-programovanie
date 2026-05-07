<?php
include "config.php";

$sql = "SELECT books.id, books.title, books.year, authors.name AS author_name
        FROM books
        JOIN authors ON books.author_id = authors.id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Evidencia kníh</title>
</head>
<body>

    <h1>Evidencia kníh</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Názov knihy</th>
            <th>Rok</th>
            <th>Autor</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["year"]; ?></td>
                <td><?php echo $row["author_name"]; ?></td>
            </tr>
        <?php } ?>

    </table>

</body>
</html>