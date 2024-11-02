<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Ticket System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
// Database connection details
$servername = "db"; // or the IP address of your MySQL server
$username = "root"; // replace with your HeidiSQL/MySQL username
$password = "1234"; // replace with your HeidiSQL/MySQL password
$dbname = 'ticketsystem';

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo '<script language="javascript">';
    echo 'alert("Datenbank ist nicht verfügbar!");';
    echo 'location.href = "/";';
    echo '</script>';
    //die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// hole Formulardaten
$email = $_POST["email"];
$name = $_POST['name'];
$message = $_POST['message'];
$topic = $_POST['topic'];
$captcha = "dummy";

// Insert data into MySQL
$query = "INSERT INTO tickets (email, name, message, topic, captcha) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $email, $name, $message, $topic, $captcha);

if ($stmt->execute()) {
    echo '<script language="javascript">';
    echo 'alert("Ticket erfolgreich eröffnet!");';
    echo 'location.href = "/";';
    echo '</script>';
} else {
    //echo json_encode(["status" => "error", "message" => "Error saving the ticket: " . $stmt->error]);
    echo '<script language="javascript">';
    echo 'alert("Fehler beim Speichern in die Datenbank!");';
    echo 'location.href = "/";';
    echo '</script>';
}

// Close connection
$stmt->close();
$conn->close();
?>
</body>

</html>