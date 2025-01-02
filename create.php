<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $created_at = date("Y-m-d H:i:s");
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO entries (user_id, title, content, created_at) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("isss", $user_id, $title, $content, $created_at);

        if ($stmt->execute()) {
            $entry_id = $stmt->insert_id;
            header("Location: view.php?id=" . $entry_id);
            exit();
        } else {
            $error = "Gagal menambahkan catatan: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = "Pernyataan gagal disiapkan: " . $conn->error;
    }
}

include 'header.php';
?>

<h2>Buat Catatan Baru</h2>
<div class="form-container">
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
    <form method="post">
        <table>
            <tr>
                <td>Judul:</td>
                <td><input type="text" name="title" required></td>
            </tr>
            <tr>
                <td>Konten:</td>
                <td><textarea name="content" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Tambah</button></td>
            </tr>
        </table>
    </form>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    h2 {
        color: #4CAF50;
        text-align: center;
    }
    .form-container {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
    table {
        width: 100%;
    }
    input[type="text"],
    textarea {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    button:hover {
        background-color: #45a049;
    }
</style>

<?php include 'footer.php'; ?>