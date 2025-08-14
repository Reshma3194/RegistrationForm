<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "basic2");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle delete action
if (isset($_GET['delete'])) {
    $rollno = $_GET['delete'];
    $sql = "DELETE FROM details WHERE rollno='$rollno'";
    mysqli_query($conn, $sql);
    header("Location: dashboard.php");
    exit;
}

$sql = "SELECT * FROM details";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #004d40;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #00796b;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-btn {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }
        .edit-btn {
            background-color: #2196F3;
        }
        .edit-btn:hover {
            background-color: #0b7dda;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .delete-btn:hover {
            background-color: #da190b;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .logout-btn {
            padding: 8px 15px;
            background-color: #d32f2f;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .logout-btn:hover {
            background-color: #b71c1c;
        }
        .add-btn {
            padding: 8px 15px;
            background-color: #00796b;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 10px;
        }
        .add-btn:hover {
            background-color: #004d40;
        }
        .yes {
            color: #4CAF50;
            font-weight: bold;
        }
        .no {
            color: #f44336;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Dashboard - Student Records</h1>
            <div>
                <a href="../index.html" class="add-btn">Add New Student</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
        
        <table>
            <tr>
                <th>Full Name</th>
                <th>Roll Number</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Branch</th>
                <th>CGPA</th>
                <th>Smart Interviews</th>
                <th>Global Certifications</th>
                <th>Cambridge Certification</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['rollno']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['branch']); ?></td>
                    <td><?php echo htmlspecialchars($row['percentage']); ?></td>
                    <td class="<?php echo $row['smart_interviews'] === 'yes' ? 'yes' : 'no'; ?>">
                        <?php echo strtoupper($row['smart_interviews']); ?>
                    </td>
                    <td class="<?php echo $row['global_cert'] === 'yes' ? 'yes' : 'no'; ?>">
                        <?php echo strtoupper($row['global_cert']); ?>
                    </td>
                    <td class="<?php echo $row['cambridge_cert'] === 'yes' ? 'yes' : 'no'; ?>">
                        <?php echo strtoupper($row['cambridge_cert']); ?>
                    </td>
                    <td>
                        <a href="edit.php?rollno=<?php echo $row['rollno']; ?>" class="action-btn edit-btn">Edit</a>
                        <a href="dashboard.php?delete=<?php echo $row['rollno']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>