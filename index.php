<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note Everyday</title>
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
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 20px;
            top: 60px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            padding: 10px;
            width: 150px;
            text-align: center;
        }
        .dropdown-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
            width: 100%;
            box-sizing: border-box; 
            margin: 5px 0;
        }
        .dropdown-menu .menu-title {
            display: flex;
            align-items: center; 
            justify-content: center;
            margin-bottom: 10px;
            color: #4CAF50;
        }
        .back-icon {
            margin-right: 10px;
            cursor: pointer;
        }
        .color-option {
            margin: 5px;
            cursor: pointer;
            padding: 5px;
            text-align: center;
            opacity: 0.7;
        }
        .color-option:hover {
            opacity: 1; 
        }
        .color-option.original {
            background-color: #f4f4f4; 
        }
        .color-option.blue {
            background-color: #90caf9; 
        }
        .color-option.red {
            background-color: #ff8a80;
        }
        .color-option.yellow {
            background-color: #ffe57f;
        }
        .welcome-message {
            max-width: 600px;
            margin: 20px auto; 
            padding: 15px;
            background-color: #e7f5e1;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            text-align: left;
        }
        footer {
            text-align: center;
            margin-top: 20px; 
            padding: 10px; 
            background-color: #4CAF50; 
            color: white; 
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Note Everyday</h1>
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>
    <nav>
        <a href="index.php">Dashboard</a>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="create.php">Add Note</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>
    <div class="dropdown-menu" id="dropdownMenu">
        <div class="menu-title">
            <span class="back-icon" onclick="window.location.href='index.php'">🔙</span>
            Note Everyday
        </div>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <div style="cursor: pointer; margin: 5px 0;" onclick="showColorOptions()">Tema</div>
        <div id="colorOptions" style="display:none;">
            <div class="color-option original" onclick="changeBackgroundColor('')">Warna Semula</div>
            <div class="color-option blue" onclick="changeBackgroundColor('blue')">Biru</div>
            <div class="color-option red" onclick="changeBackgroundColor('red')">Merah</div>
            <div class="color-option yellow" onclick="changeBackgroundColor('yellow')">Kuning</div>
        </div>
    </div>
    <div class="welcome-message">
        <p>Selamat datang di Note Everyday!</p>
        <p>Kami senang Anda bergabung dengan komunitas kami. Di Note Everyday, kami percaya bahwa setiap catatan adalah langkah menuju produktivitas dan kreativitas.</p>
        <p><strong>Catatan Penting:</strong><br>
        Sebelum Anda dapat membuat catatan atau mengakses dashboard pribadi Anda, harap lakukan registrasi atau login ke akun Anda. Ini akan memastikan bahwa semua catatan Anda aman dan dapat diakses kapan saja.</p>
        <p><strong>Langkah-langkah:</strong><br>
        Registrasi: Jika Anda pengguna baru, klik tombol "Daftar" dan ikuti instruksi untuk membuat akun.<br>
        Login: Jika Anda sudah memiliki akun, masukkan detail login Anda untuk mengakses dashboard.</p>
        <p>Setelah masuk, Anda akan dapat mulai mencatat ide, tugas, dan hal-hal penting lainnya dengan aman. Terima kasih telah memilih Note Everyday!</p>
    </div>

    <footer>
        &copy; 2024 Note Everyday. Dibuat Oleh Kelompok 8.
    </footer>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('dropdownMenu');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        function showColorOptions() {
            var colorOptions = document.getElementById('colorOptions');
            colorOptions.style.display = (colorOptions.style.display === 'none') ? 'block' : 'none';
        }

        function changeBackgroundColor(color) {
            if (color === 'blue') {
                document.body.style.backgroundColor = '#90caf9';
            } else if (color === 'red') {
                document.body.style.backgroundColor = '#ff8a80';
            } else if (color === 'yellow') {
                document.body.style.backgroundColor = '#ffe57f';
            } else {
                document.body.style.backgroundColor = '#f4f4f4';
            }
        }
    </script>
</body>
</html>