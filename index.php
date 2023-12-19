<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container fade-in">
        <div class="header">
            <h1>Your Quotes Here</h1>
        </div>
        <form action="insert.php" method="post" class="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="quotes">Type your Quotes</label>
                <input type="quotes" name="quotes" required>
            </div>
            <div class="btn-submit-container">
            <button type="submit" class="btn-submit">Add</button>
            </div>
        </form>
        <div class="table-container">
            <?php
            include 'config.php';

            // Menampilkan data dari database
            $result = $conn->query("SELECT * FROM users");

            if ($result->num_rows > 0) {
                echo '<table>';
                echo '<thead><tr><th>ID</th><th>Name</th><th>Gender</th><th>Email</th><th>Quotes</th><th>Edit | Delete</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['gender'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['quotes'] . '</td>';
                    echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a> | <a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<div class="no-data">Tidak ada data.</div>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
