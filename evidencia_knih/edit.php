<?php
include "config.php";

$error = "";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = $_GET["id"];

$sql_book = "SELECT * FROM books WHERE id = $id";
$book_result = mysqli_query($conn, $sql_book);
$book = mysqli_fetch_assoc($book_result);

if (!$book) {
    header("Location: index.php");
    exit;
}

$sql_authors = "SELECT * FROM authors";
$authors_result = mysqli_query($conn, $sql_authors);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $year = trim($_POST["year"]);
    $author_id = $_POST["author_id"];

    if ($title == "" || $year == "" || $author_id == "") {
        $error = "Vyplňte všetky polia.";
    } elseif (!is_numeric($year)) {
        $error = "Rok musí byť číslo.";
    } else {
        $title = mysqli_real_escape_string($conn, $title);
        $year = mysqli_real_escape_string($conn, $year);
        $author_id = mysqli_real_escape_string($conn, $author_id);

        $sql_update = "UPDATE books
                       SET title = '$title', year = '$year', author_id = '$author_id'
                       WHERE id = $id";

        if (mysqli_query($conn, $sql_update)) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Chyba pri úprave knihy.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Upraviť knihu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Upraviť knihu</h1>

    <?php if ($error != "") { ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="POST" action="">
        <label for="title">Názov knihy:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($book["title"]); ?>">

        <label for="year">Rok vydania:</label>
        <input type="text" name="year" id="year" value="<?php echo $book["year"]; ?>">

        <label for="author_id">Autor:</label>
        <select name="author_id" id="author_id">

            <?php while ($author = mysqli_fetch_assoc($authors_result)) { ?>
                <option value="<?php echo $author["id"]; ?>"
                    <?php if ($author["id"] == $book["author_id"]) echo "selected"; ?>>
                    <?php echo htmlspecialchars($author["name"]); ?>
                </option>
            <?php } ?>

        </select>

        <button type="submit">Uložiť zmeny</button>
        <a class="back" href="index.php">Späť</a>
    </form>

</div>

</body>
</html>