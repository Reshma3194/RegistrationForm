<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #e0f7fa, #80deea);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .message-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.2);
            text-align: center;
            margin-bottom: 20px;
        }
        h3 {
            color: #004d40;
        }
        .btn {
            padding: 10px 20px;
            background-color: #00796b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
        }
        .btn:hover {
            background-color: #004d40;
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .admin-link {
            background-color: #d32f2f;
        }
        .admin-link:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <?php
        // Establish the connection
        $conn = mysqli_connect("localhost", "root", "", "basic2");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if form data is set
        $name = $_POST['name'];
        $rollno = $_POST['rollno'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $branch = $_POST['branch'];
        $percentage = $_POST['percentage'];
        $smart_interviews = $_POST['smart_interviews'];
        $global_cert = $_POST['global_cert'];
        $cambridge_cert = $_POST['cambridge_cert'];

        // Insert query
        $sql = "INSERT INTO details (name, rollno, email, phone, branch, percentage, smart_interviews, global_cert, cambridge_cert) 
                VALUES ('$name', '$rollno', '$email', '$phone', '$branch', '$percentage', '$smart_interviews', '$global_cert', '$cambridge_cert')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>Registration successful. Your data has been stored.</h3>";
        } else {
            echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        }
        
        // Close connection
        mysqli_close($conn);
        ?>
    </div>
    
    <div class="btn-container">
        <a href="index.html" class="btn">Register Another Student</a>
        <a href="admin/login.php" class="btn admin-link">Admin Login</a>
    </div>
</body>
</html>