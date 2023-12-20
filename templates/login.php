<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

$conn = new mysqli($servername, $username, $password, $dbname);

     if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $query = "SELECT * FROM users WHERE email=?";

        if (!$stmt) {
            die("Ошибка при обработке запроса: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_resul();

        if($result->num_rows == 1){
            $user = $result->fetch_assos();
            if(password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                echo "Авторизация прошла успешно";
            } else {
                echo "Неверно введен пароль";
            } else {
                echo "Пользователь с такими данными не существует";
            }


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
    <title>Вход</title>
</head>
<body>
    <div class="container">
        <h2>Вход</h2>
        <form action="login.php" method="post">
            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" required>

            <label for="passwod">Пароль:</label>
            <input type="password" id="passwod" name="password">

            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>

