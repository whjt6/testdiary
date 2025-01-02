<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u857619896_testdiary";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php?message=Registrasi berhasil, silakan login.");
        exit();
    } else {
        $error = "Gagal mendaftar: " . $stmt->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Note Everyday</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            position: relative;
        }
        h1 {
            color: #4CAF50;
            font-size: 2.5em;
            text-align: center;
            margin: 20px 0;
        }
        nav {
            margin: 20px 0;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #4CAF50;
            padding: 10px;
            display: inline-block;
        }
        nav a:hover {
            text-decoration: underline;
            color: #333;
        }
        .menu-toggle {
            cursor: pointer;
            font-size: 24px;
            background-color: transparent;
            color: #4CAF50;
            padding: 10px;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .welcome-message {
            max-width: 400px;
            margin: 20px auto;
            padding: 15px;
            background-color: #e7f5e1;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            text-align: left;
        }
        .welcome-message input[type="text"],
        .welcome-message input[type