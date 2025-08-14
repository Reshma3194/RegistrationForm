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

// Get roll number from URL
$rollno = $_GET['rollno'] ?? '';

// Fetch student data
$sql = "SELECT * FROM details WHERE rollno='$rollno'";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $percentage = $_POST['percentage'];
    $smart_interviews = $_POST['smart_interviews'];
    $global_cert = $_POST['global_cert'];
    $cambridge_cert = $_POST['cambridge_cert'];
    
    $update_sql = "UPDATE details SET 
                    name='$name', 
                    email='$email', 
                    phone='$phone', 
                    branch='$branch', 
                    percentage='$percentage', 
                    smart_interviews='$smart_interviews', 
                    global_cert='$global_cert', 
                    cambridge_cert='$cambridge_cert' 
                   WHERE rollno='$rollno'";
    
    if (mysqli_query($conn, $update_sql)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #e0f7fa, #80deea);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.2);
        }
        h1 {
            text-align: center;
            color: #004d40;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #004d40;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
        }
        .save-btn {
            background-color: #00796b;
            color: white;
        }
        .save-btn:hover {
            background-color: #004d40;
        }
        .cancel-btn {
            background-color: #757575;
            color: white;
        }
        .cancel-btn:hover {
            background-color: #424242;
        }
        .error {
            color: #d32f2f;
            text-align: center;
            margin-bottom: 15px;
        }
        .radio-group {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .radio-group label {
            margin-right: 15px;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Student Record</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Roll Number:</label>
                <input type="text" value="<?php echo htmlspecialchars($student['rollno']); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Phone:</label>
                <input type="tel" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Branch:</label>
                <select name="branch" required>
                    <option value="CAI" <?php echo $student['branch'] == 'CAI' ? 'selected' : ''; ?>>CAI</option>
                    <option value="DS" <?php echo $student['branch'] == 'DS' ? 'selected' : ''; ?>>DS</option>
                    <option value="IOT" <?php echo $student['branch'] == 'IOT' ? 'selected' : ''; ?>>IOT</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Current CGPA:</label>
                <input type="number" name="percentage" step="0.01" value="<?php echo htmlspecialchars($student['percentage']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Smart Interviews:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="smart_interviews" value="yes" <?php echo $student['smart_interviews'] == 'yes' ? 'checked' : ''; ?> required> Yes
                    </label>
                    <label>
                        <input type="radio" name="smart_interviews" value="no" <?php echo $student['smart_interviews'] == 'no' ? 'checked' : ''; ?>> No
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Global Certifications:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="global_cert" value="yes" <?php echo $student['global_cert'] == 'yes' ? 'checked' : ''; ?> required> Yes
                    </label>
                    <label>
                        <input type="radio" name="global_cert" value="no" <?php echo $student['global_cert'] == 'no' ? 'checked' : ''; ?>> No
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Cambridge Certification:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="cambridge_cert" value="yes" <?php echo $student['cambridge_cert'] == 'yes' ? 'checked' : ''; ?> required> Yes
                    </label>
                    <label>
                        <input type="radio" name="cambridge_cert" value="no" <?php echo $student['cambridge_cert'] == 'no' ? 'checked' : ''; ?>> No
                    </label>
                </div>
            </div>
            
            <div class="btn-container">
                <a href="dashboard.php" class="btn cancel-btn">Cancel</a>
                <button type="submit" class="btn save-btn">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>