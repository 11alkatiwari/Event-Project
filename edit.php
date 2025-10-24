<?php
session_start();
include('tp.php');

$id = $_GET['id']; 
if (!isset($id)) {
    header("Location: dashboard.php");
    exit();
}

$sql = "SELECT * FROM teet WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact'];
    $gender = $_POST['gender'];
    $event_type = $_POST['event_type'];
    $location = $_POST['location'];

    $image = $row['image'];
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    $sql = "UPDATE teet SET 
                name='$name', email='$email', contact='$contact_number',
                gender='$gender', event_type='$event_type', location='$location',
                image='$image' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="log.png" height="40" alt="Logo"></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Edit Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Event</h4>
                    </div>
                    <div class="card-body">
                        <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact" class="form-control" value="<?php echo htmlspecialchars($row['contact']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="Male" <?php if($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option value="Female" <?php if($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Event Type</label>
                                <input type="text" name="event_type" class="form-control" value="<?php echo htmlspecialchars($row['event_type']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($row['location']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Current Image</label><br>
                                <img src="<?php echo $row['image']; ?>" width="120" class="img-thumbnail mb-2" alt="Event Image"><br>
                                <label class="form-label">Upload New Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Update Event</button>
                                <a href="dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Event Management. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
