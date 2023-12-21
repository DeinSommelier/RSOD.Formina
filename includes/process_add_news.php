<?php
include("../includes/connect.php");

// Validate User Input
$title = $_POST['title'];
$content = $_POST['content'];

// Prepare SQL Statement
$sql = "INSERT INTO news (title, content) VALUES ('$title', '$content')";

// Execute and Check Result
if ($conn->query($sql) === TRUE) {
    echo "Data has been successfully added";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Closing Database Connection
$conn->close();

?>