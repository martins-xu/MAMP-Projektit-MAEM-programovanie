<?php
include "config.php";

$message = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $year = trim($_POST["year"]);
    $author_id = $_POST["author_id"];

    
    if ($title == "" || $year == "" || $author_id == "") {
        $error = "Vyplňte všetky polia.";
    } elseif (!is_numeric($year)) {
        $error = "Rok musí byť číslo.";
    } else {
        $sql_insert = "INSERT INTO books (title, year, author_id)
                       VALUES ('$title', '$year', '$author_id')";

        if (mysqli_query($conn, $sql_insert)) {
            $message = "Kniha bola úspešne pridaná.";
        } else {
            $error = "Chyba pri pridávaní knihy: " . mysqli_error($conn);
        }
    }
}


$sql_authors = "SELECT * FROM authors";
$authors_result = mysqli_query($conn, $sql_authors);


$sql_books = "SELECT books.id, books.title, books.year, authors.name AS author_name
              FROM books
              JOIN authors ON books.author_id = authors.id";

$books_result = mysqli_query($conn, $sql_books);
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Evidencia kníh</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Evidencia kníh</h1>

    <?php if ($message != "") { ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <?php if ($error != "") { ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <h2>Pridať novú knihu</h2>

    <form method="POST" action="">
        <label for="title">Názov knihy:</label>
        <input type="text" name="title" id="title">

        <label for="year">Rok vydania:</label>
        <input type="text" name="year" id="year">

        <label for="author_id">Autor:</label>
        <select name="author_id" id="author_id">
            <option value="">-- Vyber autora --</option>

            <?php while ($author = mysqli_fetch_assoc($authors_result)) { ?>
                <option value="<?php echo $author["id"]; ?>">
                    <?php echo $author["name"]; ?>
                </option>
            <?php } ?>

        </select>

        <button type="submit">Pridať knihu</button>
    </form>

    <h2>Zoznam kníh</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Názov knihy</th>
            <th>Rok</th>
            <th>Autor</th>
        </tr>

        <?php while ($book = mysqli_fetch_assoc($books_result)) { ?>
            <tr>
                <td><?php echo $book["id"]; ?></td>
                <td><?php echo $book["title"]; ?></td>
                <td><?php echo $book["year"]; ?></td>
                <td><?php echo $book["author_name"]; ?></td>
            </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>