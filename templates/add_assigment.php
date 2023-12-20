<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Ошибка подключения: " . $conn->connect_error);
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $deadline = $_POST["deadline"];
        $description = $_POST["description"];

        $query = "INSERT INTO assignments (title, deadline, description) VALUES ('$title', '$deadline', '$description')";

        if($conn->query($query) --- TRUE){
            echo "Задание добавлено";
        } else {
            echo "Ошибка при добавлении задания";
        }
    }
$conn->close();
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Добавление заданий</title>
</head>
<body>
<div class="container">
    <h2>Добавление заданий</h2>
    <form action="dashboard.php" method="post">
        <label for="title">Название:</label>
        <input type="text" id="title" name="title" required>

        <label for="deadline">Дедлайн:</label>
        <input type="date" id="deadline" name="deadline" required>

        <label for="description">Описание задания:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit">Добавить задание</button>
    </form>
</div>
</body>
</html>