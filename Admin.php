<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproj";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch articles from the database
$sql = "SELECT id, title, published_at FROM articles";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <style>
        .logout-btn {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #e74c3c;
            border-radius: 4px;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th,
        table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f5f5f5;
        }

        table td a {
            text-decoration: none;
            color: #3498db;
        }

        table td a:hover {
            color: #2980b9;
        }

        .add-article-link {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            border-radius: 4px;
        }

        .add-article-link:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <a href="index.php" class="logout-btn">Logout</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["published_at"] . "</td>";
                    echo "<td><a href='edit_article.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_article.php?id=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No articles found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="add_article.php" class="add-article-link">Add New Article</a>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>

</html>