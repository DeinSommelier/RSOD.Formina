<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

if($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$query = "SELECT * FROM assignments WHERE deadline >= CURRENT_DATE() ORDER BY deadline";
$result = $conn->query($query);

$query->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Студенческий дашборд</title>

</head>
<body>
<div class="container">
    <h2>Студенческий дашборд</h2>
    <h3>Предстоящие задания</h3>
    <?php
    if($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            echo "<p><strong>Название:</strong>" . $row["title"] . "</p>";
            echo "<p><strong>Дедлайн:</strong>" . $row["deadline"] . "</p>";
            echo "<p><strong>Описание задания:</strong>" . $row["description"] . "</p>";
            echo "<hr>";
        }
    } else{
        echo "Нет предстоящих заданий.";
    }
    ?>
</div>
</body>
</html>