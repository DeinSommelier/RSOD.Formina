<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error);
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($query) === TRUE) {
        echo "Регистрация прошла успешно";
    } else {
        echo "Ошибка регистрации" . $conn->error;
    }

    $conn->close();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Регистрация</title>
    </head>
    <body>

    <div class="container">
        <h2>Регистрация</h2>

    <form action="register.php" mothod="post">
        <label for="name">Имя:</label>>
        <input type="text" id="name" name="name" required>

        <label for="email">Введите почту:</label>>
        <input type="email" id="email" name="email" required>

        <label for="passwod">Введите пароль:</label>>
        <input type="password" id="passwod" name="password" required>

    <button type="submit">Зарегистрироваться</button>
    </form>
    </div>

</body>
</html>
