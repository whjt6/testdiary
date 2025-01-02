<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM entries WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

include 'header.php';
?>

<h2>Daftar Catatan</h2>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Konten</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($entry = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($entry['title']); ?></td>
                <td><?php echo htmlspecialchars($entry['content']); ?></td>
                <td><?php echo htmlspecialchars($entry['created_at']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $entry['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $entry['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<a href="create.php">Buat Catatan Baru</a>

<?php include 'footer.php'; ?>